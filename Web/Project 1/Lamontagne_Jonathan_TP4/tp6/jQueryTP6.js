$(document).ready(function () {
	/* =Shadow Nav
	-------------------------------------------------------------------------- */
	// Append shadow image to each LI
	$("#menu li").append('<img class="shadow" src="images/icons-shadow.png" width="162" height="27" alt="" />'); // largeur * 2
	
	
	

	// Animate buttons, shrink and fade shadow
	$("#menu li").hover(
		function() {
			var e = this;
			/*Étape 1:  Monter l'élément <a>, à l'intérieur du <li> sur lequel on se trouve,
			de 20px, et aller à l'étape 2 */
			$(e).find("a").animate( { marginTop: "-20px" }, 250, 
				
				function() {
					// Étape 2: puis le descendre de 5px en une demi-seconde
					$(e).find("a").animate({ marginTop: "-15px" }, 250);
					});	
					
				// Pendant ce temps réduire la dimension et l'opacité de l'ombre l'ombre en un quart de seconde
				// Donc pas de réaction de l'ombre pour le rebond de 5px
				
				$(e).find("img.shadow").animate({ width: "80%", height: "20px", marginLeft: "16px", opacity: 0.25 }, 250);
			},
		
		//Lorsque la souris quitte
		function() {
					 
			var e = this;
					// Descendre l'élément <a> 5px sous sa position d'origine, puis l'y ramener
			$(e).find("a").animate({ marginTop: "5px" }, 250, 
					
					function() {
						$(e).find("a").animate({ marginTop: "0px" }, 250);
						});
					
					//Pendant ce temps ramener l'ombrage à ses dimensions et opacité d'origine
					
			$(e).find("img.shadow").animate({ width: "100%", height: "27px", marginLeft: "0", opacity: 1 }, 250);
			
			 }
	);

	$(function() {
				
				$('.miniature').click(function() 
									{																					
										var nom = $(this).attr('src');
										$('#grand').attr('src',nom);
										affiche();
									});
					function affiche() 
					{
						$('#grand').fadeOut(0);
						$('#grand').fadeIn(2000);
						
					}	
						
			    });
	
});