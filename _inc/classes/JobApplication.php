<?php

class JobApplication {
    private $db;

    public function __construct($database) {
        $this->db = $database->getConnection();
    }

    // Get all job applications
    public function index() {
        $sql = "SELECT ja.*, j.title, j.department 
                FROM job_applications ja
                JOIN jobs j ON ja.job_id = j.id
                ORDER BY ja.created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a specific job application by ID
    public function show($id) {
        $sql = "SELECT ja.*, j.title, j.department 
                FROM job_applications ja
                JOIN jobs j ON ja.job_id = j.id 
                WHERE ja.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Delete a job application
    public function destroy($id) {
        $sql = "DELETE FROM job_applications WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    // Update application status
    public function updateStatus($id, $status) {
        $sql = "UPDATE job_applications SET status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$status, $id]);
    }
    
    // Get applications for a specific user by email
    public function getByEmail($email) {
        $sql = "SELECT ja.*, j.title, j.department 
                FROM job_applications ja
                JOIN jobs j ON ja.job_id = j.id
                WHERE ja.email = ?
                ORDER BY ja.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
