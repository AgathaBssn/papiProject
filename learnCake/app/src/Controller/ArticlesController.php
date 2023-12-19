<?php

namespace App\Controller;

class ArticlesController extends AppController
{

    public function index(): void     //doit avoir une vue avec, c'est la vue de base sinon faut rooter
    {
        $resultset = $this->fetchTable('Articles')->find()->all();

        $this->set(compact('resultset'));
    }
    public function view($slug = NULL): void{
        $element = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('element'));
    }
    public function add()
    {
        $article = $this->Articles->newEmptyEntity();

        if ($this->request->is('post'))
        {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            if ($this->Articles->save($article))
            {
                $this->Flash->success('Bien ajouté');
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('echec de l\'ajout');
        }
        $this->set(compact('article'));
    }
    public function edit($slug)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();

        if ($this->request->is(['post', 'put']))
        {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            if ($this->Articles->save($article))
            {
                $this->Flash->success('Bien modifié');
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('echec de la modification');
        }
        $this->set(compact('article')); //jamais oublié
    }
    public function delete($slug)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();

        $this->request->allowMethod(['post', 'delete']);

        if ($this->Articles->delete($article)){
            $this->Flash->success('Bien supprimé');
            return $this->redirect(['action'=>'index']);
        }
        $this->Flash->error('echec de la supression');
    }
}
