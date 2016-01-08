<?php
App::uses('AppController', 'Controller');
class ShopController extends AppController {

//////////////////////////////////////////////////

    public $components = array(
        'Cart',
        'AuthorizeNet',
        'RequestHandler'
    );

//////////////////////////////////////////////////

    public $uses = 'Product';

//////////////////////////////////////////////////

    public function beforeFilter() {
        parent::beforeFilter();
        $this->disableCache();

        //$this->Security->validatePost = false;
    }


////////////////////////////////////////////////////

    public function clear() {
        $this->Cart->clear();
        $this->Session->setFlash('All item(s) removed from your shopping cart', 'flash_error');
        return $this->redirect('/customer');
    }

//////////////////////////////////////////////////
    public function customer_clear() {
        $this->Cart->clear();
        $this->Session->setFlash('All item(s) removed from your shopping cart', 'flash_error');
        return $this->redirect('/customer');
    }

///////////////////////////////////////////////////////

    public function customer_order() {
        if ($this->request->is('post')) {
            $this->request->data['Order']['customer_id']=$this->Auth->User('id');
            $this->Order->create();
            if ($this->Order->save($this->request->data)) {
                $this->Session->setFlash('Order placed successfully');
                return $this->redirect(array('action' => 'review'));
            } else {
                $this->Session->setFlash('Data could not be saved. Please, try again.');
            }
        }
    }

///////////////////////////////////////////////////////

    public function add() {
        if ($this->request->is('post')) {

            $id = $this->request->data['Product']['id'];

            $quantity = isset($this->request->data['Product']['quantity']) ? $this->request->data['Product']['quantity'] : null;

            $productmodId = isset($this->request->data['mods']) ? $this->request->data['mods'] : null;

            $product = $this->Cart->add($id, $quantity, $productmodId);
        }
        if(!empty($product)) {
            $this->Session->setFlash($product['Product']['name'] . ' was added to your shopping cart.', 'flash_success');
        } else {
            $this->Session->setFlash('Unable to add this product to your shopping cart.', 'flash_error');
        }
        $this->redirect($this->referer());
    }

//////////////////////////////////////////////////

    public function itemupdate() {
        if ($this->request->is('ajax')) {

            $id = $this->request->data['id'];

            $quantity = isset($this->request->data['quantity']) ? $this->request->data['quantity'] : null;

            if(isset($this->request->data['mods']) && ($this->request->data['mods'] > 0)) {
                $productmodId = $this->request->data['mods'];
            } else {
                $productmodId = null;
            }

            // echo $productmodId ;
            // die;

            $product = $this->Cart->add($id, $quantity, $productmodId);

        }
        $cart = $this->Session->read('Shop');
        echo json_encode($cart);
        $this->autoRender = false;
    }

//////////////////////////////////////////////////

    public function update() {
        $this->Cart->update($this->request->data['Product']['id'], 1);
    }

//////////////////////////////////////////////////

    public function remove($id = null) {
        $product = $this->Cart->remove($id);
        if(!empty($product)) {
            $this->Session->setFlash($product['Product']['name'] . ' was removed from your shopping cart', 'flash_error');
        }
        return $this->redirect(array('action' => 'cart'));
    }

//////////////////////////////////////////////////

    public function cartupdate() {
        if ($this->request->is('post')) {
            foreach($this->request->data['Product'] as $key => $value) {
                $p = explode('-', $key);
                $p = explode('_', $p[1]);
                $this->Cart->add($p[0], $value, $p[1]);
            }
            $this->Session->setFlash('Shopping Cart is updated.', 'flash_success');
        }
        return $this->redirect(array('action' => 'cart'));
    }


//////////////////////////////////////////////////

    public function customer_cart() {
        $shop = $this->Session->read('Shop');
        $this->set(compact('shop'));
    }


//////////////////////////////////////////////////
    public function customer_address() {

        $shop = $this->Session->read('Shop');
        if(!$shop['Order']['total']) {
            return $this->redirect('/');
        }

        if ($this->request->is('post')) {
            $this->loadModel('Order');
            $this->Order->set($this->request->data);
            if($this->Order->validates()) {
                $order = $this->request->data['Order'];
                $order['order_type'] = 'creditcard';
                $this->Session->write('Shop.Order', $order + $shop['Order']);
                return $this->redirect(array('action' => 'review'));
            } else {
                $this->Session->setFlash('The form could not be saved. Please, try again.', 'flash_error');
            }
        }
        if(!empty($shop['Order'])) {
            $this->request->data['Order'] = $shop['Order'];
        }

    }
////////////////////////////////////////////////////

    public function customer_view_pdf() {
        $shop = $this->Session->read('Shop');

        if(empty($shop)) {
            return $this->redirect('/');
        }
        if ($this->request->is('post')) {
        $this->loadModel('Order');

        // increase memory limit in PHP
        ini_set('memory_limit', '512M');
        //$this->set('post', $this->Session->read('Shop'));
    }}

//////////////////////////////////////////////////

//////////////////////////////////////////////////
    public function customer_review() {

        $shop = $this->Session->read('Shop');

        if(empty($shop)) {
            return $this->redirect('/');
        }

        if ($this->request->is('post')) {

            $this->loadModel('Order');

            $this->Order->set($this->request->data);
            if($this->Order->validates()) {
                $order = $shop;
                $order['Order']['status'] = 1;

            }
        }

        $this->set(compact('shop'));

    }
/////////////////////////////////////////////////

//////////////////////////////////////////////////

}
