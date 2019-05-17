<?php


include ("simple_html_dom.php");


// Retrieve the DOM from a given URL
$html = file_get_html('https://journals.sagepub.com/home/VRT');

// Find all "A" tags and print their HREFs
foreach($html->find('a') as $e) 
    echo $e->href . '<br>';

// Retrieve all images and print their SRCs
 foreach($html->find('img') as $e)
    echo $e->src . '<br>';

// Find all images, print their text with the "<>" included
foreach($html->find('img') as $e)
    echo $e->outertext . '<br>';

// Find the DIV tag with an id of "myId"
foreach($html->find('div#myId') as $e)
    echo $e->innertext . '<br>';

// Find all SPAN tags that have a class of "myClass"
foreach($html->find('span.myClass') as $e)
    echo $e->outertext . '<br>';

// Find all TD tags with "align=center"
foreach($html->find('td[align=center]') as $e)
    echo $e->innertext . '<br>';
    
// Extract all text from a given cell
echo $html->find('td', 1)->plaintext.'<br><hr>'; 


foreach($html->find('data') as $e)
    echo 'li--'.$e->outertext . '<br>';
	
	
foreach($html->find('nav') as $e)
{
    echo 'nav'.$e->outertext . '<br>';
  //  echo 'inav'.$e->innertext . '<br>';
	/* foreach($e->find('ul.shadow') as $ul)
		echo 'ul--'.$ul->outertext . '<br>';
		
	foreach($e->find('li') as $li)
		echo 'li--'.$li->outertext . '<br>'; */
}

/* $dom = new simple_html_dom();
$dom->load($html);

$tags = $dom->getElementsByTagName('target');
print_r($tags);
foreach ($tags as $tag) {
       $hrefs[] =  $tag->getAllAttributes();
} */

/* $dom = new simple_html_dom;
libxml_use_internal_errors(true);
$dom->load($html);
libxml_clear_errors();
foreach ($dom->getElementsByTagName('nav') as $div) {
     if($div->getAttribute('class') == 'externalLink') {
          foreach($div->getElementsByTagName('a') as $link) {
               echo $link->getAttribute('href');
          }
     }
}


$returned_content = get_data('https://journals.sagepub.com/home/VRT');
echo $returned_content;	 */

?>
<script type="text/javascript">

Box.Application.addModule('journal-nav', function(context) {
    return {
        init: function() {
            // outputs HTMLElement with id 'mod-test-module'
            console.log(context.getElement());
        }
    };
});

function loadSidebar(html) {
    var sidebarElement = document.getElementById('journal-nav');
    sidebarElement.innerHTML = html;

    // assuming firstChild has data-module
    Box.Application.start(sidebarElement.firstChild);
}

var moduleEl = document.getElementByName('journal-nav');
alert(moduleEl);

</script>