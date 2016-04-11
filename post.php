<?php

$post = function($request, $response){
    $data = $request->getParsedBody();
    $destination_data = [];
    //$destination_data['id'] = filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT);
    $destination_data['destination_name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
    $destination_data['destination_address'] = filter_var($data['address'], FILTER_SANITIZE_STRING);
    $destination_data['destination_description'] = filter_var($data['description'], FILTER_SANITIZE_STRING);
    $destination_data['destination_phone'] = filter_var($data['phone'], FILTER_SANITIZE_NUMBER_INT);
    $destination_data['destination_email'] = filter_var($data['email'], FILTER_SANITIZE_STRING);
    $destination_data['destination_activities'] = filter_var($data['activities'], FILTER_SANITIZE_STRING);
    $destination_data['destination_facilities'] = filter_var($data['facilities'], FILTER_SANITIZE_STRING);
    $destination_data['destination_cordinates'] = filter_var($data['cordinates'], FILTER_SANITIZE_STRING);
    $destination_data['destination_media_path'] = filter_var($data['path'], FILTER_SANITIZE_STRING);
    
  
    $destinationEntity = new DestinationEntity($destination_data);
    $mapper = new DestinationMapper($this->db);
    $mapper->save($destinationEntity);

    $response->getBody()->write("Data Inserted!");
    return $response;
};