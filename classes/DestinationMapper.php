<?php
class DestinationMapper extends Mapper
{
    public function getDestinations() {
        $sql = "SELECT *
            from destinations";
        $stmt = $this->db->query($sql);
        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = $row; //new DestinationEntity($row);
        }
        return $results;
    }

    public function getDestinationById($id) {
        $sql = "SELECT *
            from destinations where id = :destination_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["destination_id" => $id]);
        return new DestinationEntity($stmt->fetch());
    }

    public function save(DestinationEntity $destination) {
        $sql = "insert into destinations
            (destination_name, destination_address, destination_description, destination_phone, destination_email, destination_facilities, destination_activities, destination_cordinates, destination_media_path) values
            (:name, :address, :description, :phone, :email, :facilities, :activities, :cordinates, :media)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "name" => $destination->getName(),
            "address" => $destination->getAddress(),
            "description" => $destination->getDescription(),
            "phone" => $destination->getPhone(),
            "email" => $destination->getEmail(),
            "facilities" => $destination->getFacilities(),
            "activities" => $destination->getActivities(),
            "cordinates" => $destination->getCordinates(),
            "media" => $destination->getMedia()
        ]);
        if(!$result) {
            throw new Exception("could not save record");
        }
    }
}