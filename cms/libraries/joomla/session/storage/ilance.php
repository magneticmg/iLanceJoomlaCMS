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

/* * *
 * Assuming Joomla Framework loaded at this point. 
 */

require_once JPATH_LIBRARIES . '/joomla/session/storage.php';
require_once JPATH_LIBRARIES . '/joomla/session/storage/database.php';

class JSessionStorageIlance extends JSessionStorageDatabase {

    /**
     * 
     * @var type 
     */
    private $ilance_session; //

    function __construct($options = array()) {
        
        global $ilance; 
        
        
        $this->ilance_session = $ilance->sessions;
        
        parent::__construct($options);
    }
   

    public function read($id){
        
        $ilancedata = $this->ilance_session->session_read($id);
        
        $joomla = parent::read($id);
        
        return $joomla . 'ilancedata|' . $ilancedata; 
    }
    
    public  function write($id, $data) {
        
        $data = explode('ilancedata|', $data);
        $ilancedata = 'ilancedata|'.$data[1];
        $joomladata = $data[0];
        $this->ilance_session->session_write($id, $ilancedata);
        parent::write($id, $joomladata);
    }
    
    function destroy($id) {
        
        return true;//parent::destroy($id);
    }
    
}
