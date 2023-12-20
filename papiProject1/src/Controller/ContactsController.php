<?php
namespace App\Controller;

use App\Controller\AppController;

class ContactsController extends AppController
{
    public function index()
    {
        $resultset = $this->fetchTable('Contacts')->find()->all();  //GLOBALE
        $this->set(compact('resultset'));
    }

    public function add()
    {
        $contact = $this->Contacts->newEmptyEntity();

        if ($this->request->is('post'))
        {

            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());

            if ($this->Contacts->save($contact))
            {
                $this->Flash->success('Bien ajouté');
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('echec de l\'ajout');
        }
        $this->set(compact('contact'));
    }
    public function edit($id)
    {
        $contact = $this->Contacts->findById($id)->firstOrFail();

        if ($this->request->is(['post', 'put']))
        {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());

            if ($this->Contacts->save($contact))
            {
                $this->Flash->success('Bien modifié');
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('echec de la modification');
        }
        $this->set(compact('contact'));
    }
    public function delete($id)
    {
        $contact = $this->Contacts->findById($id)->firstOrFail();

        $this->request->allowMethod(['post', 'delete']);

        if ($this->Contacts->delete($contact)){
            $this->Flash->success('Le contact a bien été supprimé');
            return $this->redirect(['action'=>'search']);
        }
        $this->Flash->error('Echec de la supression');
    }
    public function printSearch()
    {

    }
    public function search()
    {

        $searching = $this->Contacts->newEmptyEntity();   //le profil du contact à rechercher

        if ($this->request->is('post')){    //recherche lancée
            $searching = $this->Contacts->patchEntity($searching, $this->request->getData()); //données du form dans searching

            //POUR LA RECHERCHE LES CHAMPS EN CAPS DANS LA DB
            $searching->nom = strtoupper($searching->nom);
            $searching->ville = strtoupper($searching->ville);

            //CONDITIONS DE RECHERCHE
            $conditions = [];
            $attributs = [  "id_spf"=>'id_spf rlike',
                            "titre" =>'titre rlike',
                            "nom" =>'nom rlike',
                            "prenom" => 'prenom rlike',
                            "mail" => 'mail rlike',
                            "adresse" => 'adresse rlike',
                            "cp" =>'cp rlike',
                            "ville" =>'ville rlike',
                            "telephone" => 'telephone rlike',
                            "telephone_bis" =>'telephone_bis rlike',
                            "fonction" => 'fonction rlike',
                            "categorie" => 'categorie rlike',
                            "organisme" => 'organisme rlike'
            ];

            //RECHERCHE QUI MATCH LE DEBUT
            foreach ((array_keys($attributs)) as $attribut_key):
                if ($searching->$attribut_key != NULL){
                    $conditions = $attributs[$attribut_key]. "\"^" . $searching->$attribut_key . "\"";
                }
                endforeach;
            $this->set(compact('conditions'));

            //REQUETE
            $query = $this->fetchTable('Contacts')->find('all',[
                'conditions' =>[
                    $conditions
                ],
                'order' => ['nom' => 'ASC']]);

            $this->set(compact('query'));   //recupération de la requete


            foreach ($query as $contact):   //executer requete et mettre les contacts dans $tab_res
                if (is_null($contact)){
                    $tab_res = NULL;
                }else{
                    $tab_res[] = $contact;
                }

            endforeach;

            $this->set(compact('tab_res'));

            $this->render('printSearch');   //vue spéciale rendue de recherche

        }
        $this->set(compact('searching'));

    }

    public function view($id)
    {
        $contact = $this->Contacts->findById($id)->firstOrFail();
        $this->set(compact('contact'));
    }
}
