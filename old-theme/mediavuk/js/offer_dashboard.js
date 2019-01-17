
var deutsch = "Mediavuk d.o.o. wird nicht nur bei der Webseiten-Gestaltung engagiert, die zum Wohlstand von Unternehmen beitragt und einen kompletten Service bietet, vom Konzept zur Umsetzung, als auch in der Performance-Überwachung und Verbesserung der Online-Präsenz und Geschäft.\n\n\
Im konkreten Fall geht es darum, das Projekt für die Online-Präsentation für http://www.bischofsheim.de.\n\n\
Mediavuk d.o.o. verpflichtet sich, die Frist einzuhalten und reagiert angemessen auf die Anforderungen des Kunden. Unser Personal ist jeden Tag von 8 Uhr bis 16 Uhr vorhanden.\n\n\
Nach Beendigung des Projekts erhält der Kunde 10 Stunden frei, die für die Verarbeitung, Überprüfung und Änderung verwendet werden können. Weitere Unterstützung und die Arbeit an der Website wird xx Euro pro Arbeitsstunde berechnet.";

var english = "<strong>Mediavuk d.o.o.<strong> is engaged in designing web sites that contribute to the prosperity of companies and provide a complete service from concept to implementation, and also in the performance monitoring and improvement of online presence and business.\n\n\
In the concrete case, it is about the project for the online presentation for %company%.\n\n\
Mediavuk d.o.o. undertakes to comply with the deadline and responds adequately to the requirements of the client Our staff is available every weekday from 8am to 16pm.\n\n\
Upon completion of the project, the client receives <span class='important-offer'>10 hours free</span>, that can be used for processing, review and change. Further support and work on the site will be charged <span class='important-offer'>15 euros</span> per working hour.\n\n\
Project will be finished in <strong>50 days<strong>";

var srpski = "Agencija Mediavuk d.o.o se bavi izradom rešenja za web koja proširuju mogućnosti za prosperitet preduzeća i pruža kompletnu uslugu od ideje do realizacije, ali i praćenje rezultata i unapređenja online prisustva i poslovanja.\n\n\
U konkretnom slučaju, radi se o projektu internet prezentacije za Frizura.rs.\n\n\
Mediavuk d.o.o se obavezuje da će ispoštovati rok i isporučiti obećano.\n\n\
Naše osoblje Vam je na raspolaganju radnim danima od 8h do 16h.\n\n\
Po završetku projekta, klijent dobija besplatno 10 radnih sati koje može iskoristiti za dorade, revizije i promene.\n\n\
Dalja podrška i rad na sajtu se naplaćuju xx eura po radnom satu.";

( function($) {
        // we can now rely on $ within the safety of our "bodyguard" function
        $(document).ready( function() { 
        	
        	$("#content").before("<span style='padding:2px; background:red; '>Check the content before posting!</span>");
        	if($('#content').val() == "")
        		$('#content').val(english);

        	$('#acf-language_text select').change(function()
			{
				//alert("Check the content before posting!");
				var language = $('#acf-language_text select').val()
				if(language == "deutsch")
					$('#content').val(deutsch);
				else if(language == "english")
					$('#content').val(english);
				else if(language == "srpski")
					$('#content').val(srpski);



			});


          });

    } ) ( jQuery );
