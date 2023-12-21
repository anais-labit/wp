// Ce script permet de filtrer et de trier des éléments d'une page web en utilisant le plugin Isotope pour jQuery.
// Le plugin Isotope permet d'organiser et de filtrer des éléments de façon dynamique avec un filtrage, une recherche et un tri rapides et fluides. 
// Il peut être utilisé pour afficher des portfolios, des galeries d'images, des listes d'articles, etc.


/*jshint jquery:true */
/*global $:true */

var $ = jQuery.noConflict();

$(document).ready(function($) {
	"use strict";
	
 	/*-------------------------------------------------*/
	/* =  Isotope
	/*-------------------------------------------------*/
	var winDow = $(window);
			// Needed variables
	var $container=$('.filter-container');
	var $filter=$('.filter');

	try{
		$container.imagesLoaded( function(){
			$container.show();
			$container.isotope({
				filter:'*',
				layoutMode:'fitRows',
				animationOptions:{
					duration:750,
					easing:'linear'
				},
				transformsEnabled: false //Disable transformations
			});
		});
	} catch(err) {
	}

	winDow.on('resize', function(){
		var selector = $filter.find('a.active').attr('data-filter');

		try {
			$container.isotope({ 
				filter	: selector,
				animationOptions: {
					duration: 750,
					easing	: 'linear',
					queue	: false,
				}
			});
		} catch(err) {
		}
		return false;
	});
	
	// Isotope Filter 
	$filter.find('a').on('click', function(){
		var selector = $(this).attr('data-filter');

		try {
			$container.isotope({ 
				filter	: selector,
				animationOptions: {
					duration: 750,
					easing	: 'linear',
					queue	: false,
				}
			});
		} catch(err) {

		}
		return false;
	});


	var filterItemA	= $('.filter a');

	filterItemA.on('click', function(){
		var $this = $(this);
		if ( !$this.hasClass('active')) {
			filterItemA.removeClass('active');
			$this.addClass('active');
		}
	});


	$('.filter a').on('click', function(e) {

	    // This will prevent the default action of the anchor
	    event.preventDefault();

	    // Failing the above, you could use this, however the above is recommended
	    return false;

	});



});