<?php
/**
 * Global helper functions for Organizo
 * Created on 2026-05-05
 */

function getPriorities($connection) {
    static $priorities = null;
    if ($priorities === null) {
        $stmt = $connection->query("SELECT PriorityID as id, PriorityName as name FROM priority ORDER BY PriorityID ASC");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $priorities = array_map(function($item) {
            $item['slug'] = str_replace(' ', '-', strtolower($item['name']));
            return $item;
        }, $data);
    }
    return $priorities;
}

function getStatuses($connection) {
    static $statuses = null;
    if ($statuses === null) {
        $stmt = $connection->query("SELECT StatusID as id, StatusName as name FROM status ORDER BY StatusID ASC");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $statuses = array_map(function($item) {
            $item['slug'] = str_replace(' ', '-', strtolower($item['name']));
            return $item;
        }, $data);
    }
    return $statuses;
}

function getPriorityClasses($connection) {
    return array_column(getPriorities($connection), 'slug', 'id');
}

function getStatusClasses($connection) {
    return array_column(getStatuses($connection), 'slug', 'id');
}

function getTasks($connection, $uid, $archived = 0) {
    $sql = "SELECT task.*, project.Name AS ProjectName, priority.PriorityName, status.StatusName 
            FROM task 
            JOIN project ON task.ProjectID = project.ProjectID 
            JOIN priority ON task.PriorityID = priority.PriorityID 
            JOIN status ON task.StatusID = status.StatusID 
            WHERE project.UserID = :u AND task.isArchived = :a 
            ORDER BY task.TaskID DESC";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':u' => $uid, ':a' => $archived]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProjects($connection, $uid) {
    $query = "SELECT project.*, COUNT(task.TaskID) AS TaskCount 
              FROM project 
              LEFT JOIN task ON project.ProjectID = task.ProjectID 
              WHERE project.UserID = :user_id 
              GROUP BY project.ProjectID 
              ORDER BY project.Name ASC";
    $stmt = $connection->prepare($query);
    $stmt->execute([':user_id' => $uid]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProjectCount($connection, $uid) {
    $query = "SELECT COUNT(*) FROM project WHERE UserID = :user_id";
    $stmt = $connection->prepare($query);
    $stmt->execute([':user_id' => $uid]);
    return $stmt->fetchColumn();
}

function getTaskCount($connection, $uid, $archived = 0) {
    $query = "SELECT COUNT(*) FROM task JOIN project ON task.ProjectID = project.ProjectID WHERE project.UserID = :user_id AND task.isArchived = :archived";
    $stmt = $connection->prepare($query);
    $stmt->execute([':user_id' => $uid, ':archived' => $archived]);
    return $stmt->fetchColumn();
}

/**
 * Fetch a single project by ID and UserID (with task count)
 */
function getProject($connection, $id, $userId) {
    $query = "SELECT project.*, COUNT(task.TaskID) AS TaskCount 
              FROM project 
              LEFT JOIN task ON project.ProjectID = task.ProjectID 
              WHERE project.ProjectID = :id AND project.UserID = :user_id
              GROUP BY project.ProjectID";
    $stmt = $connection->prepare($query);
    $stmt->execute([':id' => $id, ':user_id' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Fetch a single task by ID and UserID (with full details)
 */
function getTask($connection, $id, $userId) {
    $sql = "SELECT task.*, project.Name AS ProjectName, priority.PriorityName, status.StatusName 
            FROM task 
            JOIN project ON task.ProjectID = project.ProjectID 
            JOIN priority ON task.PriorityID = priority.PriorityID 
            JOIN status ON task.StatusID = status.StatusID 
            WHERE task.TaskID = :id AND project.UserID = :user_id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([':id' => $id, ':user_id' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
