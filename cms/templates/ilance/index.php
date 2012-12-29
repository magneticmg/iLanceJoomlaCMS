<?php
/* ==========================================================================*\
  || ######################################################################## ||
  || # MMInc PHP                                                            # ||
  || # Project: CMS                                             # ||
  || #  $Id:  $                                                             # ||
  || # $Date:  $                                                            # ||
  || # $Author:  $                                                          # ||
  || # $Rev: $                                                              # ||
  || # -------------------------------------------------------------------- # ||
  || # @Copyright (C) 2010 - Cameron Barr, Magnetic Merchandising Inc.      # ||
  || # @license GNU/GPL http://www.gnu.org/copyleft/gpl.html                # ||
  || # -------------------------------------------------------------------- # ||
  || # http://www.magneticmerchandising.com  info@magneticmerchandising.com # ||
  ||                                                                          ||
  || # -------------------------------------------------------------------- # ||
  || ######################################################################## ||
  \*========================================================================== */
?>
<style>
    #right { float: left; width: 20%}
    #left { float: left; width: 20%; padding: 10px;}
    #component { width: 55% ; float: left;}
    #right .block-content, #left .block-content { border-left: 1px solid #ccc; border-right: 1px solid #ccc }
    .block .block-content {
position: relative;
background-color: white;
border: solid #CCC;
border-width: 0px 1px 0px 1px;
padding: 10px 10px 10px 10px;
background-color: white;
}
ul.actions li { float: right; list-style: none; padding-left: 8px;}
</style>
<div id="content">

    <?php if ($this->countModules('left')): ?>
        <div id="left"><jdoc:include type="modules" name="left"  style="block"/>
        </div>
    <?php endif; ?>
    
    

    <div id="component"><jdoc:include type="component" /></div>

    <?php  if ($this->countModules('right')): ?>
        <div id="right"><jdoc:include type="modules" name="right"  chrome="rounded" style="blockgrey"/>
        </div>
    <?php endif; ?>
    <div style="clear: both"></div>