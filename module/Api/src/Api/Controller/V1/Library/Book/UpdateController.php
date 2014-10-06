<?php

namespace Api\Controller\V1\Library\Book;

use Api\Exception;
use Doctrine\ORM\EntityNotFoundException;
use Library\Form\Book\CreateFormInputFilter;
use Library\Service\Book\CrudService;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class UpdateController extends AbstractActionController
{

    /**
     * @var CreateFormInputFilter
     */
    private $filter;

    /**
     * @var CrudService
     */
    private $service;

    public function __construct(CreateFormInputFilter $filter, CrudService $service)
    {
        $this->filter = $filter;
        $this->service = $service;
    }

    public function indexAction()
    {
        /**
         * @var Request  $request
         * @var Response $response
         */
        $request = $this->getRequest();
        $response = $this->getResponse();

        $id = $this->params()->fromRoute('id', null);

        try {
            $bookEntity = $this->service->getById($id);

            $this->filter->setData($request->getPost()->toArray());

            if ($this->filter->isValid()) {
                $bookEntity = $this->service->update($bookEntity, $this->filter);

                return new JsonModel($this->service->extractEntity($bookEntity));
            } else {
                $messages = $this->filter->getMessages();
                $response->setStatusCode(Response::STATUS_CODE_400);

                return new JsonModel([
                    'error' => [
                        'messages' => $messages
                    ]
                ]);
            }
        } catch (EntityNotFoundException $e) {
            throw new Exception\NotFoundException;
        } catch (\PDOException $e) {
            throw new Exception\PDOServiceUnavailableException();
        }
    }
}