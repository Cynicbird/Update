<?php

namespace App\Controller;

use App\Entity\News;
use DateTime;
use SplStack;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Unirest\Request;
use Unirest\Request\Body;
class NewsController extends Controller {


    public function index(){
        return $this->render('news/index.html_1.twig');
    }

    public function getDataApi($idurl) {
        $url=$this->getApisname();
        $data = array('author' => 'author');
        $body = Body::json($data);
        $headers = array('Accept' => 'application/json');
        $response = Request::get($url[$idurl], $headers, $body);
        $response->body;  
        $response=json_encode($response);
       $response=   json_decode($response,true);
     // $hey = $response['body']['articles'][0]['description'];
     return $response;
    }
    
    
    /**
     * @Route("/", name="homepage")
     */
    public function checkData(){   
     $this->Newnews();
      $news=$this->getNews();
      dump($news);
    return $this->render('news/index.html_2.twig',['news'=>$news
            ]);     

}


        
        
        
        
        
        
   
  
    
  
        public function getApisname() {
            $urlapi = array();
            $em = $this->getDoctrine()
        ->getManager()
       ->getRepository('App:Apis');
$myapis = $em->findAll() ;

for($i=count($myapis)-1;$i>=0;$i--) {
$urlapi[$i]=$myapis[$i]->getUrl();
}

        return $urlapi;     

    }
    
    
    
    /**
     * @Route("/XX/")
     */
    public function getNews() {
        $splstack =  new SplStack();
$em = $this->getDoctrine()
        ->getManager()
       ->getRepository('App:News');
$mynews =$em->findAll() ;
foreach($mynews as $key => $value){
    $splstack ->push($mynews[$key]);
}
$splstack->rewind();
return $splstack;




    }
      
  
    public function Notsame($a) {
        $g;
      $repository = $this->getDoctrine()->getRepository(News::class);
$product = $repository->findOneBy(['title' => $a]);
if (!$product ){
$g=false;
} else {
    $g=true;
}
return $g;
}
    
      public function ajaxAction(Request $request)
{
    $data = $request->request->get('request');
}

 
 /** 
     * @Route("/ae/", name="ae")
     */
    public function Newnews(){
        $j=0;
     $no = true;
           $Data= $this->getDataApi(2);
           $entityManager = $this->getDoctrine()->getManager();

       for($i=0;$i<count($Data['body']['articles']);$i++) {
$repository = $this->getDoctrine()->getRepository(News::class);
$product = $repository->findOneBy(['title' => $Data['body']['articles'][$i]['title'] ]);
if(!$product){
                  $news = new News();
        $news->setTitle($Data['body']['articles'][$i]['title']);
         $news->setSummary($Data['body']['articles'][$i]['description']);
           $news->setSrcImageFile($Data['body']['articles'][$i]['urlToImage']);
         $news->setArticleURL($Data['body']['articles'][$i]['url']);
         
         $piece = preg_split("( T | Z )", $Data['body']['articles'][$i]['publishedAt']);
         $time = new DateTime($piece[0]);
          $news->setReleaseTime($time);

                 $entityManager->persist($news);   
 }
  
}
 $entityManager->flush();
    }

    
}
