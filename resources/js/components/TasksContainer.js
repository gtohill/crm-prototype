import React, { useState, useEffect} from "react";
import axios from "axios";

import Task from "./Task";

import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

function TasksContainer() {
    const [tasks, setTasks] = useState([]); 
    const [id, setId] = useState();   
    let currentTask;

    // get tasks, then set them as state
    useEffect(() => {
        axios.get("http://localhost:8000/api/task").then(res => {            
            setTasks(res.data);            
        });
    }, [tasks]);

    // for display purposes, sort tasks by date
    tasks.sort(function(a, b){                
        return new Date(a.date) - new Date(b.date);
    });
    
    // show a task
    if(id > 0){        
        currentTask = <Task id={id} />;
    }
    else{
        currentTask = <h4>Please select a task to complete</h4>;
    }
    

    return (
        <div className="container-fluid">
            <div className="row">
                <div className="col-sm-5">
                    <table className="table">
                        <thead>
                            <tr>
                                <th scope="col">Company</th>
                                <th scope="col">Contacnt</th>
                                <th scope="col">Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">view</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                            {tasks.map(task => (
                                <tr key={task.id}>
                                    <td>{task.name}</td>
                                    <td>{task.contact}</td>
                                    <td>{task.date}</td>
                                    <td>{task.description}</td>
                                    <td>                                    
                                        <button onClick={ () => setId(task.id)} type="button">{task.id}</button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
                <div className="col-sm-5">
                    {currentTask}
                </div>
            </div>
        </div>
    );
}

export default TasksContainer;
