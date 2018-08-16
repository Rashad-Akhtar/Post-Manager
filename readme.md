<h1 align="center">Forum Discussion Application</h1>

## Description

<p>It's an application where people can create discussions on various topics in which they face problems . For each discussion there is comment section where people can share their thoughts on that particular discussion . Only registered users can create discussion and comment . People can like or dislike a particular comment . Among those comments the creator of that discussion can select the best comment and then the comment section will turn off . Users also have points . By default an user will get 20 points , for each comment user will get 10 points , if a particular user's comment is selected as best answer that user will get 200 points . There are also filter systems in these application . Open discussions , close discussions , channels can be filtered out . There are also many more features in this application . </p>
<br>

## How To Run This Project

<p><b> Step - 1 :- </b> Download or clone this project from this repository . </p>

<p><b> Step - 2 :- </b> Go to your directory where your downloaded or cloned project is located . Open your terminal there . Gitbash termninal is preferred . Now run this command :- </p>

```
composer install 
```

<p><b> Step - 3 :- </b> Then run this command in your terminal :-  </p>

```
cp .env.example .env ( if using gitbash )
copy .env.example .env ( if using windows command prompt )
```

<p><b> Step - 4 :- </b> Now create a database named forum in your phpmyadmin . </p>

<p><b> Step - 5 :- </b> Now open .env file and configure it like this  </p>

```
DB_DATABASE=forum
DB_USERNAME=root
DB_PASSWORD= 
```

<p><b> Step - 6 :- </b> Then run this command in your terminal :-  </p>

```
php artisan key:generate
```

<p><b> Step - 7 :- </b> Then run this command in your terminal :-  </p>

```
php artisan migrate
```

<p><b> Step - 8 :- </b> Then run this command in your terminal :-  </p>

```
php artisan db:seed 
```

<p><b> Step - 9 :- </b> Now run this command in your terminal :-  </p>

```
php artisan serve
```
Now copy that localhost link and paste it in your browser .

<p><b> Step - 10 :- </b> Now to access the administrator account log in with password "admin" and email "admin@rash.com" </p>
<br>


<h2 align="center">Project Screenshots</h2>

<p align="center">
  <img src="screenshots/forum1.JPG" width="400">
  <img src="screenshots/forum2.JPG" width="400">
</p>

<p align="center">
  <img src="screenshots/forum3.JPG" width="400">
  <img src="screenshots/forum4.JPG" width="400">
</p>  

