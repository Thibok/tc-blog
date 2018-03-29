<h1>Tc-blog</h1>

<h2>Project</h2>

This project is for my training at Openclassroom on the DA PHP/Symfony path.This is my fifth project, for wich i need create my first
blog in PHP with a user management system.

<h2>Prerequisites</h2

<ul>
  <li>PHP 7</li>
  <li>Mysql</li>
  <li>Apache</li>
</ul>
<br/>
<strong>This project use PSR-4 autoloading</strong>

<h2>Add-ons</h2>

<ul>
  <li>Bootstrap</li>
  <li>JQuery</li>
</ul>

The bootstrap template <a href="https://startbootstrap.com/template-overviews/blog-home/">Blog Home</a>

<h2>Installation</h2>

<h3>1. Clone the source code</h3>

<pre>git clone https://github.com/Thibok/tc-blog.git</pre>

<h3>2. Create config</h3>

<p>Create a folder Config in /App with app.xml and routes.xml files.

For app.xml write your config in xml.Example :

  \<definitions><br/>
    \<define var="total_news" value="5"/><br/>
   \</definitions>
</p>

<p>For routes.xml write your path with vars or not.Example :

  \<routes><br/>
    \<route url="/show_news([0-9]+)\.html" module="News" action="show" vars="news_number"/><br/>
  \</routes>
</p>

<p>Update PDOFactory.php and enter your login database informations or enter this in config file.</p>

<h3>3. Install dependencies</h3>

<p>Install Twig :

<pre>
  composer require twig/twig:~2.0
</pre>

Install SwiftMailer :
<pre>
  composer require "swiftmailer/swiftmailer:^6.0"
</pre>
</p>

<h2>Run ! </h2>


