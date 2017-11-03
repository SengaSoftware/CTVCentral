<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CTVBackendService
 *
 * @author ejacwro
 */
class CTVBackend {
    /**
     * Returns list of tvOffers
     *
     * @return tvOffer[]
     */
    public function getOffers()
    {
        $mdl = new Application_Model_Offer();
        return $mdl->getOffers();
    }
    
    /**
     * Creates new offer
     *
     * @param tvOffer $offer new offer object
     * @return bool true on success
     */
    public function addOffer($offer)
    {
        $mdl = new Application_Model_Offer();
        $result = $mdl->addOffer($offer);
        if($result)
            return TRUE;
        else
            return FALSE;
    }
    
    /**
     * Updates offer or creates new one if not found
     *
     * @param tvOffer $offer new offer object
     * @return bool true on success
     */
    public function updateOffer($offer)
    {
        $mdl = new Application_Model_Offer();
        $result = $mdl->updateOffer($offer);
        if($result)
            return TRUE;
        else
            return FALSE;
    }
    /**
     * Removes offer
     *
     * @param integer $id offer id to be deleted
     * @return bool true on success 
     */
    public function removeOffer($id)
    {
        $mdl = new Application_Model_Offer();
        $result = $mdl->removeOffer($id);
        if($result)
            return TRUE;
        else
            return FALSE;
    }
}
