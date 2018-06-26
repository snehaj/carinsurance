
Test Task 
======================

	1) Print out your name

	2) Calculate the termly insurance policy

	3) Build an sql table


Project structure
===================

	1) pricesettings.json contains all the price settings

	2) Controllers contains controller logic

	  a) Home controller is used for the name printing and query related task
	  b) Price controller is used for the insurance policy calculation

	3) Views handling the html views

	4) Helpers for the business logic
	5) Sql has Database and query file
6) Assets has js and css using

Task Files
===============

	Task1

	   Home controller/index action is used for first task   the loop is printing in the 
			 view file views/home/index.php
			 url - Home/index
			 -----------------------------------------
	Task2

	   PriceController/index action is used for second task,all the logic is handled in helpers/calculation.php 
	   and view maintained in views/price/index.php
		  url - Price/index
		   --------------------------------------------
		   
	 Task 3
	   
	   The query and db structure download file is also handled in Home controller/db action
			 view file  views/home/query.php
			 url - Home/db
		----------------------------------------------------------------
         


To start using the application:
===============================

	open you terminal or cmd

	clone the project

	change directory to the project's directory

	run command composer install

	PHP -S localhost:80

