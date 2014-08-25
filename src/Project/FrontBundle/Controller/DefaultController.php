<?php

namespace Project\FrontBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Project\UserBundle\Entity\Reservation;
use Project\UserBundle\Entity\Search;

class DefaultController extends Controller
{

	public function indexAction() {


		$firstArray = array();//UtilitiesAPI::getDefaultContent('inicio', $this);
		$secondArray = array();

		$em = $this -> getDoctrine() -> getManager();
		$dql = "SELECT n FROM ProjectUserBundle:Page n";
		$query = $em -> createQuery($dql);
		//$query -> setParameter('term', '%'.$term.'%');
		$query ->setMaxResults(1);

		
		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProjectFrontBundle:Default:index.html.twig', $array);
	}
	
	public function farmaciaAction() {


		$firstArray = array();//UtilitiesAPI::getDefaultContent('inicio', $this);
		$secondArray = array();

		$em = $this -> getDoctrine() -> getManager();
		$dql = "SELECT n FROM ProjectUserBundle:Page n";
		$query = $em -> createQuery($dql);
		//$query -> setParameter('term', '%'.$term.'%');
		$query ->setMaxResults(1);

		
		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProjectFrontBundle:Default:farmacia.html.twig', $array);
	}
	
	public function serviciosAction() {


		$firstArray = array();//UtilitiesAPI::getDefaultContent('inicio', $this);
		$secondArray = array();

		$em = $this -> getDoctrine() -> getManager();
		$dql = "SELECT n FROM ProjectUserBundle:Page n";
		$query = $em -> createQuery($dql);
		//$query -> setParameter('term', '%'.$term.'%');
		$query ->setMaxResults(1);

		
		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProjectFrontBundle:Default:servicios.html.twig', $array);
	}

	public function tarjetaAction() {


		$firstArray = array();//UtilitiesAPI::getDefaultContent('inicio', $this);
		$secondArray = array();

		$em = $this -> getDoctrine() -> getManager();
		$dql = "SELECT n FROM ProjectUserBundle:Page n";
		$query = $em -> createQuery($dql);
		//$query -> setParameter('term', '%'.$term.'%');
		$query ->setMaxResults(1);

		
		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProjectFrontBundle:Default:tarjeta.html.twig', $array);
	}

	public function tiendaAction() {


		$firstArray = array();//UtilitiesAPI::getDefaultContent('inicio', $this);
		$secondArray = array();

		$em = $this -> getDoctrine() -> getManager();
		$dql = "SELECT n FROM ProjectUserBundle:Page n";
		$query = $em -> createQuery($dql);
		//$query -> setParameter('term', '%'.$term.'%');
		$query ->setMaxResults(1);

		
		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProjectFrontBundle:Default:tienda.html.twig', $array);
	}

		public function contactoAction() {


		$firstArray = array();//UtilitiesAPI::getDefaultContent('inicio', $this);
		$secondArray = array();

		$em = $this -> getDoctrine() -> getManager();
		$dql = "SELECT n FROM ProjectUserBundle:Page n";
		$query = $em -> createQuery($dql);
		//$query -> setParameter('term', '%'.$term.'%');
		$query ->setMaxResults(1);

		
		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProjectFrontBundle:Default:contacto.html.twig', $array);
	}

	public function pageAction($id,$friendlyname) {
		
		$firstArray = UtilitiesAPI::getDefaultContent('contacto', $this);
		$secondArray = array();
		$secondArray['page'] = $this -> getDoctrine() -> getRepository('ProjectUserBundle:Page') -> find($id);
		$secondArray['idpage'] = $secondArray['page']->getId();
		$secondArray['articles'] = null;
		$secondArray['listado'] = null;//UtilitiesAPI::esListado($secondArray['idpage'],$this);
		$secondArray['images'] = array();
		$secondArray['tags'] = explode(',', $secondArray['page']->getTags());
		if(trim($secondArray['tags'][0])=="")$secondArray['tags'] = null;
		
		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProjectFrontBundle:Default:page.html.twig', $array);
	}
	public function categoryAction($id,$friendlyname) {
		
		$firstArray = UtilitiesAPI::getDefaultContent('contacto', $this);
		$secondArray = array();
		$secondArray['page'] = $this -> getDoctrine() -> getRepository('ProjectUserBundle:Category') -> find($id);
		$secondArray['idpage'] = $secondArray['page']->getId();
		$secondArray['articles'] = null;
		$secondArray['listado'] = null;
		$secondArray['images'] = array();
		$secondArray['tags'] = explode(',', $secondArray['page']->getTags());
		if(trim($secondArray['tags'][0])=="")$secondArray['tags'] = null;

		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProjectFrontBundle:Default:category.html.twig', $array);
	}
	public function tagAction($tag) {
		
		$firstArray = UtilitiesAPI::getDefaultContent('tag', $this);
		$secondArray = array();

		$em = $this -> getDoctrine() -> getManager();
		$dql = "SELECT n.id,n.name,n.dateCreated,n.friendlyName,n.descriptionMeta FROM ProjectUserBundle:Page n WHERE n.tags like :tags ORDER BY n.dateCreated ASC";
		
		$query = $em -> createQuery($dql);
		$query -> setParameter('tags', '%'.$tag.'%');
		$secondArray['objects']  = $query -> getResult();
		$secondArray['backgrounds'] = $this -> getDoctrine() -> getRepository('ProjectUserBundle:Background') -> findByHome(1);
		$secondArray['idpage'] = null;    
        $secondArray['tag'] = $tag;
        $secondArray['search'] = false;

		$array = array_merge($firstArray, $secondArray);
		return $this -> render('ProjectFrontBundle:Default:tags.html.twig', $array);
	}
    

}
