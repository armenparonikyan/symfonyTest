<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class PostsController extends Controller
{
	/**
	* @Route("/posts")
	* @Method("GET")
	*/
	public function showAction()
	{
		$normalizer = new ObjectNormalizer();
		$normalizer->setIgnoredAttributes(array('comments'));
		$encoder = new JsonEncoder();

		$serializer = new Serializer(array($normalizer), array($encoder));

		$posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
		$seiakizedPosts = $serializer->serialize($posts, 'json');
		return new Response($seiakizedPosts, Response::HTTP_OK, ['content-type' => 'application/json']);
	}

	/**
	* @Route("/")
	* @Method("GET")
	*/
	public function indexAction()
	{
		return $this->render('default/index.html.twig');
	}
}