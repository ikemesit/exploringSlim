<?php
class DestinationEntity
{
    protected $destination_id;
    protected $destination_name;
    protected $destination_address;
    protected $destination_description;
    protected $destination_phone;
    protected $destination_email;
    protected $destination_facilities;
    protected $destination_activities;
    protected $destination_cordinates;
    protected $destination_media_path;
    /**
     * Accept an array of data matching properties of this class
     * and create the class
     *
     * @param array $data The data to use to create
     */
    public function __construct(array $data) {
        // no id if we're creating
        if(isset($data['id'])) {
            $this->destination_id = $data['id'];
        }
        $this->destination_name = $data['destination_name'];
        $this->destination_address = $data['destination_address'];
        $this->destination_description = $data['destination_description'];
        $this->destination_phone = $data['destination_phone'];
        $this->destination_email = $data['destination_email'];
        $this->destination_facilities = $data['destination_facilities'];
        $this->destination_activities = $data['destination_activities'];
        $this->destination_cordinates = $data['destination_cordinates'];
        $this->destination_media_path = $data['destination_media_path'];
    }
    public function getId() {
        return $this->destination_id;
    }
    public function getName() {
        return $this->destination_name;
    }
    public function getAddress() {
        return $this->destination_address;
    }
    public function getDescription() {
        return $this->destination_description;
    }
    public function getPhone() {
        return $this->destination_phone;
    }
    public function getEmail() {
        return $this->destination_email;
    }
    public function getFacilities() {
        return $this->destination_facilities;
    }
    public function getActivities() {
        return $this->destination_activities;
    }
    public function getCordinates() {
        return $this->destination_cordinates;
    }
    public function getMedia() {
        return $this->destination_media_path;
    }
}