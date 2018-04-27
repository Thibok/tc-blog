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

<p>Create a file config.xml in /App/Config in this style and complete with informations :

<?xml version="1.0" encoding="utf-8" ?>
<definitions>

    <!-- Database -->
	<define var="db_host" value="yourHost"/>
	<define var="db_name" value="yourDbName"/>
	<define var="db_username" value="yourDbUsername"/>
	<define var="db_password" value="yourDbPassword"/>
	<!---->
	<!-- SMTP Server -->
	<define var="username_smtp" value="yourSmtpUserName"/>
	<define var="password_smtp" value="yourSmtpPassword"/>
	<define var="domain_smtp" value="yourSmtpDomain"/>
	<define var="port_smtp" value="youSmtpPort"/>
	<!---->
	<!-- Others -->
	<define var="private_captcha_key" value="yourPrivateCaptchaKey"/>
	<define var="contact_email" value="yourContactEmail"/>
	<!---->
	
</definitions>
<strong>If you use captcha, change captcha public key in app.xml</strong>
</p>

<h3>3. Create htaccess</h3>

<p>Create a file .htaccess in /Web and you can config simple in this style :
  
<pre>RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.*)$ index.php [QSA,L]</pre>
</p>

<h3>4. Create database</h3>

<p>For create database, you can use the demo tcBlog.sql file in root folder</p>

<h3>5. Create cron and script</h3>

<p>For protect brute force attack, this project use cron, you can create this with : 

<pre>crontab -e</pre>

And you can write your cron in this style for execute a script all 24h : 

<pre>* * */1 * * php /path/to/your/file.php</pre>

For finish create your simply script in this style and complete :

<pre>$bdd = new PDO('mysql:host=yourDbHost;dbname=yourDbName;', 'yourDbUsername', 'yourDbPassword');

$bdd->exec('DELETE FROM connexion');</pre>
</p>

<h3>6. Install dependencies</h3>

<p>Let's install composer dependencies for you with this command :
  
  <pre>php composer.phar install</pre>
</p>

<h2>Run !</h2>


