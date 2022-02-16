<?php

/* Documento de Configuração do Site Admin */

$SITEADMIN['versao'] = '4.0 RC';
$SITEADMIN['titulo'] = 'SiteAdmin';
$SITEADMIN['cpanel'] = '';

$SITEADMIN['siteurl'] = 'http://' . $_SERVER['SERVER_NAME'];
$SITEADMIN['siteroot'] = 'http://' . $_SERVER['SERVER_NAME'] . '/admin';

$SITEADMIN['sitename'] = explode('http://', $SITEADMIN['siteurl']);
$SITEADMIN['sitename'] = $SITEADMIN['sitename'][1];

$SITEADMIN['pageTitle'] = 'SiteAdmin v' . $SITEADMIN['versao'] . ' / ' . $SITEADMIN['sitename'] . ' - ' . $SITEADMIN['titulo'];