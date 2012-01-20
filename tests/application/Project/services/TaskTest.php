<?php 

class Project_Service_TaskTest extends PHPUnit_Framework_TestCase
{

    public function testGetlistMethodShouldReturnArrayOfTaskObjects()
    {
        $TaskService = new Project_Service_Task();
        $result = $TaskService->getList();
        $this->assertInternalType('array', $result);
        if (is_array($result)) {
            $isTaskObject = true;
            foreach ($result as $task) {
                if (!($task instanceof Project_Model_Task)) {
                         $isTaskObject = false;
                }
            }
            $this->assertTrue( $isTaskObject);
        }
    }	
	
	public function testDeleteMethodShouldReturnTrue()
    {
        $task = new Project_Model_Task();
        $taskService = new Project_Service_Task();
        $result = $taskService->delete($task);
        $this->assertTrue($result);
    }
    
    
    public function testSaveMethodWithNewTaskGivenShouldReturnSuccessConstant()
    {
    	$task = new Project_Model_Task();
        $task->setName('TaskName');
        $taskService = new Project_Service_task();
        $result = $taskService->save($task);
        $this->assertEquals ($projectService::TASK_CREATED, $result);
    	
    	
    	
    }
  
	public function testSaveMethodWithExistingTaskGivenShouldReturnSuccessConstant() 
    {

    	$task = new Project_Model_Task();
        $task->setId(1)
               ->setName('TaskName');
        $taskService = new Project_Service_Task();
        $result = $taskService->save($task);
        $this->assertEquals ($userService::TASK_UPDATED, $result);
    	
    }
	
}