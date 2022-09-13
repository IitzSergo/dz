<?php

namespace Core\Controllers;

use Core\Exceptions\Exception404;
use Core\Helpers\Message;
use Core\Models\Article;
use Core\Models\User;
use Core\Services\Db;
use Core\Views\View;

class HomeController extends Controller
{
  public function index()
  {
    $articles = Article::all();

    $title = 'Main Page';

    View::render('index', compact('title', 'articles'));
  }

  public function contacts()
  {
    View::render('contacts');
  }

  public function sendEmail()
  {
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!$email || !$subject || !$message) {
      Message::set('Error', 'danger');
      $this->redirect('/contacts');
    }

    // отправляем
    Message::set('Thank!');
    $this->redirect('/contacts');
  }


  public function article($id)
  {
    $article = Article::findOrFail($id);
    View::render('article', compact('article'));
  }
  public function storeArticle()
  {
    $article = Article::findOrFail(2);
    $article->remove();
    $this->redirect('/');
  }
}