<?php
//application/views/pics/index.php

$this->load->view($this->config->item('theme') . 'header'); //slug comes from custom_config file

echo '<h2>Picture Categories</h2>';
echo '<h3><a href="' . site_url('pics/' . 'Seattle Sounders') . '">' . 'Seattle Sounders </a></h3>';
echo '<h3><a href="' . site_url('pics/' . 'FC Barcelona') . '">' . 'FC Barcelona </a></h3>';
echo '<h3><a href="' . site_url('pics/' . 'Real Madrid') . '">' . 'Real Madrid </a></h3>';

$this->load->view($this->config->item('theme') . 'footer'); 
?>