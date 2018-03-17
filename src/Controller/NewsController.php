<?php

namespace App\Controller;

use App\Entity\Apis;
use App\Entity\Category;
use App\Entity\News;
use DateTime;
use SplStack;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Unirest\Request;
use Unirest\Request\Body;
use function dump;
class NewsController extends Controller {

    /**
     * @Route("/")
     */
    public function indexe()
    {
        return $this->redirectToRoute('homepage');

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
     * @Route("  /{_locale}/news", name="homepage")
     */
    public function checkData(){
        $news=$this->Newnews();
        $news=$this->getNews();
        return $this->render('news/index.html_2.twig',['news'=>$news
        ]);

    }
    /**
     * @Route("  /{_locale}/news/Notice", name="Notice")
     */
    public function notice(){

        return $this->render('news/index.html.twig');


    }



    /**
     * @Route("  /{_locale}/news/About", name="About")
     */
    public function About (){

        return $this->render('news/index.html.twig');

    }


    /**
     * @Route("  /{_locale}/news/Questions", name="Questions")
     */
    public function Questions(){

        return $this->render('news/index.html.twig');

    }


    /**
     * @Route("  /{_locale}/news/Termsofuse", name="Termsofuse")
     */
    public function Termsofuse (){

        return $this->render('news/index.html.twig');

    }
    
  /**
     * @Route("  /{_locale}/news/video", name="video")
     */
    public function Video (){

        return $this->render('news/video.html.twig');

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



    public function Country($a) {
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


    /**
     * @Route("/{_locale}/news/{variable}", defaults={"variable" = 1}, name="test")
     */
    public function Category($variable){
        
        $repository = $this->getDoctrine()->getRepository(Apis::class);
        $product = $repository->findOneBy(['type' => $variable]);
   $cat=$product->getUrl();
 $Data=$this->Parnoms($cat);

          
                  return $this->render('news/category.html.twig',['news'=>$Data['body']['articles'],
        ]);

    
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


    /**
     * @Route("/smo/")
     */
    public function encore(){
        $em = $this->getDoctrine()->getManager();
        $news = new News();
        $news->setTitle("hey");
        $news->setSummary("KIm and kong");
        $news->setSrcImageFile("LOok at me");
        $news->setArticleURL("follow me");
        $news->setReleaseTime("20:45:54 ");

        $apis = new Apis();
        $apis ->setName("buzzfeed");
        $apis->setUrl("https://newsapi.org/v2/top-headlines?sources=buzzfeed&apiKey=5066496d62264db78791108501d16781");
        $apis->setType("News");

        $category= new Category();
        $category->setName("News");
        $category->setApi($apis);
        $category->setNews($news);
        $category->setName("News");
        $em->persist($news);
        $em->persist($apis);
        $em->persist($category);
        $em->flush();

    }











    public function Newnews(){
    
        $Url=$this->getApisname();
        foreach ($Url as $key =>  $value){
            $g=$key;
            $Data= $this->getDataApi($g);

            for($i=0;$i<count($Data['body']['articles']);$i++) {

                $Data= $this->getDataApi($g);
                $entityManager = $this->getDoctrine()->getManager();
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

        }
        $entityManager->flush();
    }


    public function Parnoms($idurl) {
      
        $data = array('author' => 'author');
        $body = Body::json($data);
        $headers = array('Accept' => 'application/json');
        $response = Request::get($idurl, $headers, $body);
        $response->body;
        $response=json_encode($response);
        $response=   json_decode($response,true);
        // $hey = $response['body']['articles'][0]['description'];
        return $response;
    }


  public function Newnews2($name){

            $Data= $this->Parnoms();

            for($i=0;$i<count($Data['body']['articles']);$i++) {

                $Data= $this->getDataApi($g);



                    $news = new News();
                    $news->setTitle($Data['body']['articles'][$i]['title']);
                    $news->setSummary($Data['body']['articles'][$i]['description']);
                    $news->setSrcImageFile($Data['body']['articles'][$i]['urlToImage']);
                    $news->setArticleURL($Data['body']['articles'][$i]['url']);
                    $piece = preg_split("( T | Z )", $Data['body']['articles'][$i]['publishedAt']);
                    $time = new DateTime($piece[0]);
                    $news->setReleaseTime($time);
                
                }
            }

        }
    


