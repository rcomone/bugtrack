<?php 
/**
 * Bugtrack
 *  
 *  LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 * 
 * @category       Bugtrack
 * @package        Project
 * @subpackage     Model
 * @desc           IssueComment DbTable representation
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-02)
 *
 */
/**
 * @category       Bugtrack
 * @package        Project
 * @subpackage     Model
 * @desc           IssueComment DbTable representation
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-02)
 *
 */
 

class Project_Model_DbTable_IssueComment extends Zend_Db_Table_Abstract
{
    public function __construct()
    {
        $options = array(
            'name' => 'proj_issueComment',
            'primary' => 'isc_id',
            'referenceMap' => array(
                'Issue' => array( 
                        'columns' => array('iss_id'),
                        'refTableClass' => 'Project_Model_DbTable_Issue',
                        'refColumns' => array('iss_id'),
                        'onDelete' => self::RESTRICT,
                        'onUpdate' => self::CASCADE
                ),
                'staffmembre' => array( 
                        'columns' => array('usm_id'),
                        'refTableClass' => 'Project_Model_DbTable_Staffmembre',
                        'refColumns' => array('usm_id'),
                        'onDelete' => self::RESTRICT,
                        'onUpdate' => self::CASCADE
                )
            )
        );
        
        parent::__construct($options);
    }
}