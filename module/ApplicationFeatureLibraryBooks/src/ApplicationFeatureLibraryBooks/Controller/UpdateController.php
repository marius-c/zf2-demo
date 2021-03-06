<?php
/**
 * This file is part of Zf2-demo package
 *
 * @author Rafal Ksiazek <harpcio@gmail.com>
 * @copyright Rafal Ksiazek F.H.U. Studioars
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ApplicationFeatureLibraryBooks\Controller;

use ApplicationFeatureLibraryBooks\Form\CreateForm;
use ApplicationFeatureLibraryBooks\Service\CrudService;
use Zend\Mvc\Controller\AbstractActionController;

class UpdateController extends AbstractActionController
{
    /**
     * @var CreateForm
     */
    private $form;

    /**
     * @var CrudService
     */
    private $service;

    public function __construct(CreateForm $form, CrudService $service)
    {
        $this->form = $form;
        $this->service = $service;
    }

    public function indexAction()
    {
        /** @var \Zend\Http\Request $request */
        $request = $this->getRequest();
        $id = $this->params()->fromRoute('id', null);

        try {
            $bookEntity = $this->service->getById($id);
            $this->form->get('submit')->setValue('Update');

            if ($request->isPost()) {
                $this->form->setData($request->getPost()->toArray() ? : []);
                if ($this->form->isValid()) {
                    $this->service->update($bookEntity, $this->form->getInputFilter());
                    $this->flashMessenger()->addSuccessMessage('Books saved successfully!');
                } else {
                    $this->flashMessenger()->addErrorMessage('Please fill form correctly');
                }
            } else {
                $data = $this->service->extractEntity($bookEntity);
                $this->form->setData($data);
            }

            return [
                'form' => $this->form
            ];
        } catch (\Exception $e) {
            $this->flashMessenger()->addErrorMessage($e->getMessage());

            return $this->redirect()->toRoute('library/books');
        }
    }

}