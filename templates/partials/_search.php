<?php 
  global $wp_query;   
  if (is_search() && isset($_GET['s']) && $_GET['s']) :
    
    echo '<div class="search-header">';
      $qtd = $wp_query->found_posts;
      $resultados = $qtd > 1 ? ' resultados' : ' resultado';
      $resultados = $qtd === 0 ? $qtd.' resultados' : '<span class="green">' . $qtd . $resultados . '</span>';
      echo '<p class="title">Sua busca por <strong>'. get_search_query() .'</strong> retornou '. $resultados .' </p>';
      if ($wp_query->found_posts == 0) {
        echo '<p>Você pode refazer a busca com outra palavra-chave, voltar para continuar navegando ou dar uma olhadinha nos últimos destaques do nosso blog, o que acha?  ;)</p>';
      }
    echo '</div>';

    echo '<script type="text/javascript">
      // focus on search field after it has loaded
      document.getElementById("search-el") && document.getElementById("search-el").focus();
    </script>';
          
  endif;
?>