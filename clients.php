<?php

include_once(__DIR__.'/assets/includes/includes.php');

    if(empty($_POST['action'])) {
        // If we don't have an action, we need to kick them out.
        header('Location: /');
        exit;
    }
    header('Content-Type: application/json');
    switch($_POST['action']) {
        case 'getAllClients':
            // Get all of the clients out of the database, and then return a json array with that data
            $returnClient = array();
            $clients = new Clients();
            $allClients = $clients->getAllClients();
            if(!empty($allClients)) {
                foreach($allClients as $client) {
                    $tempArray = array('id'=>$client['client_id'], 'name'=>$client['first_name'].' '.$client['last_name'], 'company'=>$client['company_name']);
                    array_push($returnClient, $tempArray);
                }
            }
            print json_encode($returnClient);
            break;
        default:
            print array();
            break;
    }
?>