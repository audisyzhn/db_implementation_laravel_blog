<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle("Laravel Blog");
        SEOMeta::setCanonical(url()->full());
        OpenGraph::setTitle("Laravel Blog");
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'WebSite');
        OpenGraph::addProperty('locale', 'en');
        OpenGraph::addProperty('locale:alternate', 'en-us');
        TwitterCard::setTitle("Laravel Blog");
        TwitterCard::setType("WebSite");
        JsonLd::setTitle("Laravel Blog");
        JsonLd::setType('WebSite');
        JsonLd::setUrl(url()->full());


        $articles = Article::latest('created_at')->take(4)->get();
        return view('welcome',compact('articles'));
    }
}
