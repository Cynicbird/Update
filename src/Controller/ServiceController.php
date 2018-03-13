<?php
namespace App\Controller;

use App\Entity\News;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Unirest\Method;
use Unirest\Request;
use Unirest\Request\Body;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ServiceController{
    protected $Dataapi= null;
  protected $NewsCreated = null;
    
  
       public function getData() {
        $data = array('author' => 'author');
        $body = Body::json($data);
        $headers = array('Accept' => 'application/json');
        $response = Request::get('https://newsapi.org/v2/top-headlines?sources=abc-news-au&apiKey=5066496d62264db78791108501d16781', $headers, $body);
        $response->body;  
        $response=json_encode($response);
       $response=   json_decode($response,true);
     // $hey = $response['body']['articles'][0]['description'];
         $this->$response->Dataapi;
    }
    
    public function Newnews(){
        $this->getData();
        $Data->$this;
           $random = mt_rand($yourMin, $yourMax);
         $entityManager = $this->getDoctrine()->getManager();
        $news = new News();
        $news->setTitle($Data['body']['articles'][0]['title'])
       ->setSummary($Data['body']['articles'][0]['description'])
        ->setSrcImageFile($Data['body']['articles'][0]['urlToImage'])
        ->setArticleURL($Data['body']['articles'][0]['url'])
         ->setReleaseTime($Data['body']['articles'][0]['publishedAt']);
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($news);
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
            return new Response($news);
        
    }
    
    
    
}