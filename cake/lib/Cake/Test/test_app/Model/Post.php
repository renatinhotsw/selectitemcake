<?php
/**
 * Test App Comment Model
 *
 * CakePHP : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP Project
 * @package       Cake.Test.TestApp.Model
 * @since         CakePHP v 1.2.0.7726
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Post
 *
 * @package       Cake.Test.TestApp.Model
 */
class Post extends AppModel {

	public $useTable = 'posts';

	public function beforeSave($options = array())
{
	debugger::dump($this->data);
	print 'PASSOU NO MODEL';

		if(!empty($this->data['Model']['campoDoArquivo']['name'])) {
        $this->data['Model']['campoDoArquivo'] = $this->upload($this->data['Model']['campoDoArquivo']);
    } else {
        unset($this->data['Model']['campoDoArquivo']);
    }
}



}
