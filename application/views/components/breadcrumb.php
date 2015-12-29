<ol class="breadcrumb">
  <?php echo get_breadcrumb($breadData, $menu_prefix); ?>
  <li class="active">
  <?php echo empty($breadData) ? 
  $this->Glossary_M->get_word('home', $this->data['lang_id']) : 
  $body; 
  ?>
  </li>
</ol> 
