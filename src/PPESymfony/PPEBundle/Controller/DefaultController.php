<?php

namespace PPESymfony\PPEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use PPESymfony\PPEBundle\Entity\Ville;
use PPESymfony\PPEBundle\Entity\Sejour;
use PPESymfony\PPEBundle\Entity\Patient;
use PPESymfony\PPEBundle\Entity\Service;
use PPESymfony\PPEBundle\Entity\Chambre;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PPESymfonyPPEBundle:Default:index.html.twig');
    }

	
	//Partie Tanguy
    public function createVilleAction(Request $request)
    {
    	$uneVille = new Ville();
    	$formBuilder=$this->createFormBuilder($uneVille);
    	$formBuilder->add('libelle', 'text', array('label'=>'Saisir le nom de la ville: '));
    	$formBuilder->add('save', 'submit');
    	$form=$formBuilder->getForm();

    	if($request->getMethod()=='POST')
    	{
    		$form->bind($request);
    		if($form->isValid())
    		{
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($uneVille);
    			$em->flush();
				return $this->redirectToRoute('ppe_symfony_ppe_readVille');
    		}
    	}

        return $this->render('PPESymfonyPPEBundle:Default:createVille.html.twig',array('form'=>$form->createView()));
    }

    public function updateVilleAction(Request $request)
    {
        $id=$request->query->get('id');
        $em=$this->getDoctrine()->getManager();
        $repository=$em->getRepository('PPESymfonyPPEBundle:Ville');
        $uneVille=$repository->find($id);
        $formBuilder=$this->createFormBuilder($uneVille);
        $formBuilder->add('libelle','text',array('label'=>'Saisir le nom de la ville: '));
        $formBuilder->add('save', 'submit');
        $form=$formBuilder->getForm();

        if($request->getMethod()=='POST')
        {
            $form->bind($request);
            if($form->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($uneVille);
                $em->flush();
                return $this->redirectToRoute('ppe_symfony_ppe_readVille');
            }
        }

        return $this->render('PPESymfonyPPEBundle:Default:updateVille.html.twig', array('form'=>$form->createView()));
    }

    public function deleteVilleAction(Request $request)
    {
		$id=$request->query->get('id');
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('PPESymfonyPPEBundle:Ville');
		$uneVille=$repository->find($id);
		
		
		$em->remove($uneVille);
		$em->flush();
		
		
        return $this->redirectToRoute('ppe_symfony_ppe_readVille');
    }

    public function readVilleAction()
    {
    	$doctrine=$this->getDoctrine();
    	$entityManager=$doctrine->getManager();
    	$repository=$entityManager->getRepository('PPESymfonyPPEBundle:Ville');
    	$lesVilles=$repository->findAll();

        return $this->render('PPESymfonyPPEBundle:Default:readVille.html.twig', array('lesVilles'=>$lesVilles));
    }
	
	
	
	
	
	//Partie Ryad
	
	public function patientAction()
    {
		$doctrine=$this->getDoctrine();
		$entityManager=$doctrine->GetManager();
		$repository = $entityManager->getRepository('PPESymfonyPPEBundle:Patient');
		$lesPa = $repository->findAll();
        return $this->render('PPESymfonyPPEBundle:Default:patient.html.twig',array('lesPa'=>$lesPa));
    }

	 public function modificationpatientAction(Request $request)
    {
		$id=$request->query->get('id');
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('PPESymfonyPPEBundle:Patient');
		$unPa =$repository->find($id);
		
		$formbuilder=$this->createFormBuilder($unPa);
		$formbuilder->add('ville','entity',array('class'=>'PPESymfonyPPEBundle:Ville','property'=>'libelle'));
		$formbuilder->add('numSecu','text',array('label'=>'Saisir le numéro de securité sociale: '));
		$formbuilder->add('nom','text',array('label'=>'Saisir le nom: '));
		$formbuilder->add('prenom','text',array('label'=>'Saisir le prenom: '));
		$formbuilder->add('dateNaiss','date',array('label'=>'Saisir la date de naissance: ', 'years'=>range(1930, date('Y')), 'format'=>'dd-MM-yyyy'));
		$formbuilder->add('adrNum','text',array('label'=>'Saisir le numéro de l\'adresse: '));
		$formbuilder->add('adrRue','text',array('label'=>'Saisir la rue: '));
		$formbuilder->add('mail','text',array('label'=>'Saisir le mail: '));
		$formbuilder->add('estAssuree', 'choice', array(
                    'label' => 'Êtes vous assuré ?',
                    'choices' => array(1 => 'Oui',0 => 'Non'),
                    'expanded' => true,
                    'multiple' => false,
                    'required' => true
                ));
		
		
		
		$formbuilder->add('save','submit');
		$form=$formbuilder->getForm();
		if($request->getMethod()=='POST')
		{
			$form->bind($request);
			if($form->isValid())
			{
				$em =$this->getDoctrine()->getManager();
				$em->persist($unPa);
				$em->flush();
				
				return $this->redirectToRoute('ppe_symfony_ppe_patient');
			}
		}
        return $this->render('PPESymfonyPPEBundle:Default:modification.html.twig',array('form'=>$form->createView()));
    }

	public function ajoutpatientAction(Request $request)
    {
		$unPa = new Patient();
		$formbuilder=$this->createFormBuilder($unPa);
		$formbuilder->add('ville','entity',array('class'=>'PPESymfonyPPEBundle:Ville','property'=>'libelle','label'=>'Choisir la ville: '));
		$formbuilder->add('numSecu','text',array('label'=>'Saisir le num secu: '));
		$formbuilder->add('nom','text',array('label'=>'Saisir le nom: '));
		$formbuilder->add('prenom','text',array('label'=>'Saisir le prenom: '));
		$formbuilder->add('dateNaiss','date',array('label'=>'Saisir la date de naissance: ', 'years'=>range(1930, date('Y')), 'format'=>'dd-MM-yyyy'));
		$formbuilder->add('adrNum','text',array('label'=>'Saisir numéro adresse: '));
		$formbuilder->add('adrRue','text',array('label'=>'Saisir rue adresse: '));
		$formbuilder->add('mail','text',array('label'=>'Saisir l\'adresse email: '));
		$formbuilder->add('estAssuree', 'choice', array('label' => 'Êtes vous assuré ?','choices' => array(1 => 'Oui', 0 => 'Non'),'expanded' => true,'multiple' => false,'required' => true));
		$formbuilder->add('save','submit');
		$form=$formbuilder->getForm();
		
		if($request->getMethod()=='POST')
		{
			$form->bind($request);
			if($form->isValid())
			{
				$em =$this->getDoctrine()->getManager();
				$em->persist($unPa);
				$em->flush();
				return $this->redirectToRoute('ppe_symfony_ppe_patient');
			}
		}
        return $this->render('PPESymfonyPPEBundle:Default:ajoutpatient.html.twig',array('form'=>$form->createView()));
    }
	
	public function supppatientAction(Request $request)
    {
		$id=$request->query->get('id');
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('PPESymfonyPPEBundle:Patient');
		$unPatient=$repository->find($id);
		
		
		$em->remove($unPatient);
		$em->flush();
		
		
        return $this->redirectToRoute('ppe_symfony_ppe_patient');
    }
	
	//partie PA
	
	public function sejourAction()
    {
		$doctrine=$this->getDoctrine();
		$entityManager=$doctrine->getManager();
		$repository=$entityManager->getRepository('PPESymfonyPPEBundle:Sejour');
		//Recupération des séjours
		$lesSejours=$repository->findAll();
        return $this->render('PPESymfonyPPEBundle:Default:sejour.html.twig',array('lesSejours'=>$lesSejours));
    }
	
	public function ajoutSejourAction(Request $request)
    {
		$unSejour=new Sejour();
		
		$formBuilder=$this->createFormBuilder($unSejour);
		$formBuilder->add('dateDepart','date',array('label'=>'Saisir la date d\'arrivée dans le service: ', 'years'=>range(1930, date('Y')), 'format'=>'dd-MM-yyyy'));
		$formBuilder->add('dateFin','date',array('label'=>'Saisir la date de départ du service: ', 'years'=>range(1930, date('Y')), 'format'=>'dd-MM-yyyy'));
		$formBuilder->add('lachambre','entity',array('class'=>'PPESymfonyPPEBundle:Chambre','property'=>'getLesInfos','label'=>'Numéro de la chambre: '));
		$formBuilder->add('lepatient','entity',array('class'=>'PPESymfonyPPEBundle:Patient','property'=>'nom','label'=>'Nom du patient: '));
		$formBuilder->add('numLit','integer',array('label'=>'Numéro du lit: '));
		$formBuilder->add('estEntre', 'choice', array('label' => 'Le séjour à t-il commencé ?','choices' => array(1 => 'Oui', 0 => 'Non'),'expanded' => true,'multiple' => false,'required' => true));
		$formBuilder->add('estSortie', 'choice', array('label' => 'Le séjour est-il fini ?','choices' => array(1 => 'Oui', 0 => 'Non'),'expanded' => true,'multiple' => false,'required' => true));
		$formBuilder->add('save','submit');
		$form=$formBuilder->getForm();
		
		if($request->getMethod()=='POST')
		{
			$form->bind($request);
			if($form->isValid())
			{
				$em=$this->getDoctrine()->getManager();
				$em->persist($unSejour);
				$em->flush();
				return $this->redirectToRoute('ppe_symfony_ppe_sejour');
			}
		}
        return $this->render('PPESymfonyPPEBundle:Default:ajoutsejour.html.twig',array('leFormulaire'=>$form->createView()));
    }
	
	public function modifSejourAction(Request $request)
    {
		$id=$request->query->get('id');
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('PPESymfonyPPEBundle:Sejour');
		$unSejour=$repository->find($id);
		
		$formBuilder=$this->createFormBuilder($unSejour);
		$formBuilder->add('dateDepart','date',array('label'=>'Saisir la date d\'arrivée dans le service: ', 'years'=>range(1930, date('Y')), 'format'=>'dd-MM-yyyy'));
		$formBuilder->add('dateFin','date',array('label'=>'Saisir la date de départ du service: ', 'years'=>range(1930, date('Y')), 'format'=>'dd-MM-yyyy'));
		$formBuilder->add('lachambre','entity',array('class'=>'PPESymfonyPPEBundle:Chambre','property'=>'getLesInfos','label'=>'Numéro de la chambre: '));
		$formBuilder->add('lepatient','entity',array('class'=>'PPESymfonyPPEBundle:Patient','property'=>'id','label'=>'Nom du patient: '));
		$formBuilder->add('numLit','integer',array('label'=>'Numéro du lit: '));
		$formBuilder->add('estEntre', 'choice', array('label' => 'Le séjour à t-il commencé ?','choices' => array(1 => 'Oui', 0 => 'Non'),'expanded' => true,'multiple' => false,'required' => true));
		$formBuilder->add('estSortie', 'choice', array('label' => 'Le séjour est-il fini ?','choices' => array(1 => 'Oui', 0 => 'Non'),'expanded' => true,'multiple' => false,'required' => true));
		$formBuilder->add('save','submit');
		$form=$formBuilder->getForm();
		
		if($request->getMethod()=='POST')
		{
			$form->bind($request);
			if($form->isValid())
			{
				$em=$this->getDoctrine()->getManager();
				$em->persist($unSejour);
				$em->flush();
				return $this->redirectToRoute('ppe_symfony_ppe_sejour');
			}
		}
        return $this->render('PPESymfonyPPEBundle:Default:modifsejour.html.twig',array('form'=>$form->createView()));
    }
	
	public function supprimerSejourAction(Request $request)
    {
		$id=$request->query->get('id');
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('PPESymfonyPPEBundle:Sejour');
		$unSejour=$repository->find($id);
		
		
		$em->remove($unSejour);
		$em->flush();
		
		
        return $this->redirectToRoute('ppe_symfony_ppe_sejour');
    }
	
	
	//Service
	public function servicesAction()
    {
		$doctrine=$this->getDoctrine();
		$entityManager=$doctrine->GetManager();
		$repository = $entityManager->getRepository('PPESymfonyPPEBundle:Service');
		$lesS = $repository->findAll();
        return $this->render('PPESymfonyPPEBundle:Default:services.html.twig',array('lesS'=>$lesS));
    }
	
	
	public function modificationserviceAction(Request $request)
    {
		$id=$request->query->get('id');
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('PPESymfonyPPEBundle:Service');
		$unS=$repository->find($id);
		$formbuilder=$this->createFormBuilder($unS);
		$formbuilder->add('libelle','text',array('label'=>'Saisir le libelle'));

		$formbuilder->add('save','submit');
		$form=$formbuilder->getForm();
		if($request->getMethod()=='POST')
		{
			$form->bind($request);
			if($form->isValid())
			{
				$em =$this->getDoctrine()->getManager();
				$em->persist($unS);
				$em->flush();
				return $this->redirectToRoute('ppe_symfony_ppe_service');
			}
		}
        return $this->render('PPESymfonyPPEBundle:Default:modificationservice.html.twig',array('form'=>$form->createView()));
    }
	
	public function ajouterserviceAction(Request $request)
    {
		$unSe = new Service();

		$formBuilder=$this->createformBuilder($unSe);
		$formBuilder->add('libelle','text',array('label'=>'Saisir le nom du service :'));
		$formBuilder ->add('save','submit');
		$form=$formBuilder->getForm();
		if ($request->getMethod()=='POST')
		{
			$form->bind($request);
			if ($form->isValid())
			{
				$em=$this->getDoctrine()->getManager();
				$em->persist($unSe);
				$em->flush();
				return $this->redirectToRoute('ppe_symfony_ppe_service');
			}
		}
        return $this->render('PPESymfonyPPEBundle:Default:ajouterservice.html.twig',array('form'=>$form->createView()));
    }
	
	public function supprimerServiceAction(Request $request)
    {
		$id=$request->query->get('id');
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('PPESymfonyPPEBundle:Service');
		$unService=$repository->find($id);
		
		
		$em->remove($unService);
		$em->flush();
		
		
        return $this->redirectToRoute('ppe_symfony_ppe_service');
    }
	
	// Les Chambres
	
	public function chambreAction()
    {
		$doctrine=$this->getDoctrine();
		$entityManager=$doctrine->GetManager();
		$repository = $entityManager->getRepository('PPESymfonyPPEBundle:Chambre');
		$lesChambres = $repository->findAll();
        return $this->render('PPESymfonyPPEBundle:Default:chambre.html.twig',array('lesChambres'=>$lesChambres));
    }
	
	public function ajoutChambreAction(Request $request)
    {
		$uneChambre=new Chambre();
		
		$formBuilder=$this->createFormBuilder($uneChambre);
		$formBuilder->add('couleur','text',array('label'=>'Saisir la couleur: '));
		$formBuilder->add('leservice','entity',array('class'=>'PPESymfonyPPEBundle:Service','property'=>'libelle','label'=>'Nom du service: '));
		$formBuilder->add('save','submit');
		$form=$formBuilder->getForm();
		
		if($request->getMethod()=='POST')
		{
			$form->bind($request);
			if($form->isValid())
			{
				$em=$this->getDoctrine()->getManager();
				$em->persist($uneChambre);
				$em->flush();
				return $this->redirectToRoute('ppe_symfony_ppe_chambre');
			}
		}
        return $this->render('PPESymfonyPPEBundle:Default:ajoutChambre.html.twig',array('leFormulaire'=>$form->createView()));
    }
	
	
	public function modifChambreAction(Request $request)
    {
		$id=$request->query->get('id');
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('PPESymfonyPPEBundle:Chambre');
		$uneChambre=$repository->find($id);
		
		$formBuilder=$this->createFormBuilder($uneChambre);
		$formBuilder->add('couleur','text',array('label'=>'Saisir la couleur: '));
		$formBuilder->add('leservice','entity',array('class'=>'PPESymfonyPPEBundle:Service','property'=>'getLesInfos','label'=>'Nom du service: '));
		$formBuilder->add('save','submit');
		$form=$formBuilder->getForm();
		
		if($request->getMethod()=='POST')
		{
			$form->bind($request);
			if($form->isValid())
			{
				$em=$this->getDoctrine()->getManager();
				$em->persist($uneChambre);
				$em->flush();
				return $this->redirectToRoute('ppe_symfony_ppe_chambre');
			}
		}
        return $this->render('PPESymfonyPPEBundle:Default:modifChambre.html.twig',array('form'=>$form->createView()));
    }
	
	public function supprimerChambreAction(Request $request)
    {
		$id=$request->query->get('id');
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('PPESymfonyPPEBundle:Chambre');
		$uneChambre=$repository->find($id);
		
		
		$em->remove($uneChambre);
		$em->flush();
		
		
        return $this->redirectToRoute('ppe_symfony_ppe_chambre');
    }
	

	
}
