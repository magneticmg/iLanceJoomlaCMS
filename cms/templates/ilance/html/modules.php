<?php
/**
 * @version		$Id: modules.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;


/*
 * Module chrome that allows for rounded corners by wrapping in nested div tags
 */
function modChrome_block($module, &$params, &$attribs)
{ ?>

<div class="block-wrapper ">
	<div class="block">
			<div class="block-top">
					<div class="block-right">
							<div class="block-left"></div>
					</div>
			</div>
		<?php if ($module->showtitle != 0) : ?>	<div class="block-header">
			<span style="float:right; padding-top:3px" class="smaller gray"></span>						
							<?php echo $module->title; ?>
						</div><?php endif; ?>
			<div class="block-content" style="padding: 0px">
					<?php echo $module->content; ?>
			</div>
			<div class="block-footer">
					<div class="block-right">
							<div class="block-left"></div>
					</div>
			</div>			
	</div>	
</div>

	<?php
}

function modChrome_blockgrey($module, &$params, &$attribs){
    
    ?>
    <div class="block-wrapper">

			<div class="block3">
			
					<div class="block3-top">
							<div class="block3-right">
									<div class="block3-left"></div>
							</div>
					</div>
					
					<?php if ($module->showtitle): ?><div class="block3-header"><?php  echo $module->title; ?></div> <?php endif; ?>
					
			<?php echo $module->content; ?>
					
					<div class="block3-footer">
							<div class="block3-right">
									<div class="block3-left"></div>
							</div>
					</div>
			</div>
		</div>
<?php
}
