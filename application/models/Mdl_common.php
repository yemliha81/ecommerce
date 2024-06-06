<?php

class Mdl_common extends CI_Model 
{
  function get_pages()
  {
    $pages = $this->db->select('*')
        ->where('type', '0')
        ->get('page_table')->result_array();
    return $pages;
  }
  
  function get_categories()
  {
    $categories = $this->db->select('*')->get('category_table')->result_array();
    return $categories;
  }
  
  function get_lang()
  {
    return $this->lang->load('index', $_SESSION['lang'], true);
  }
}