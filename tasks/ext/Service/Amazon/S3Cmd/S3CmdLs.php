<?php
/*
 * $Id$
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information please see
 * <http://phing.info>.
 */

require_once dirname(dirname(__FILE__)) . '/S3Cmd.php';

/**
 * Service_Amazon_S3CmdLs class.
 * 
 * @author    Anton Stöckl <anton@stoeckl.de>
 * @version   $Revision$
 * @package   phing.tasks.ext
 * @extends Service_Amazon_S3Cmd
 */
class S3CmdLs extends Service_Amazon_S3Cmd 
{
    public function execute()
    {
        $this->_setOperation('ls');
        $this->_showFullCommand();
        $this->_validateOperationParams();
        $this->_executeCommand();
    }
    
    protected function _validateOperationParams()
    {
        if ($this->_skipStrictChecks === true) {
            return true;
        }
        
        if (!empty($this->_source)) {
             if ($this->_validateObjectPath(Service_Amazon_S3Cmd::BUCKET_OBJECT_OPTIONAL, $this->_source) === false) {
                 throw new BuildException('Source is not valid');
             }
        }
    }
}
