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

<p>Create a file config.xml in /App/Config and enter database informations

Write your config in xml.Example :

  \<definitions><br/>
    \<define var="db_name" value="example"/><br/>
   \</definitions>
</p>

<p>Update PDOFactory.php and change by your vars</p>

<h3>3. Create htaccess</h3>

<p>Create a file .htaccess in /Web and edit this for redirect request on index.php and prevents access to other files</p>

<h2>Run ! </h2>


