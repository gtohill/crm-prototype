import React, { useEffect, useState } from "react";
import axios from "axios";
import { useForm } from "react-hook-form";

function Task(props) {
    const [task, setTask] = useState([]);
    const { register, handleSubmit } = useForm();
    const [checkBox, setCheck] = useState(0);

    const onSubmit = data => {
        console.log(JSON.stringify(data));
        axios
            .patch(`http://localhost:8000/api/task/${data.id}`, data)
            .then(data => {
                // disable form inputs of this task
                var x = document.getElementById("myFieldSet"); 
                x.disabled = true;                
                alert("Success! The task was updated!");
            })
            .catch(err => {
                console.log(err);
            });
    };

    const handleChange = event => {
        const { name, value } = event.target;
        setTask({
            ...task,
            [name]: value
        });
        // to prevent all click events from marking the check box for completed tasks
        if(event.target.name === "status"){            
            isChecked(checkBox);
        }
        
    };

    useEffect(() => {
        fetchData();
    }, [props.id]);

    const fetchData = async () => {
        const data = await fetch(`http://localhost:8000/api/task/${props.id}`);
        const item = await data.json();
        setTask(item);
        setCheck(item.status);
        var x = document.getElementById("myFieldSet"); 
        x.disabled = false; 
    };

    function isChecked(checkBox) {
        if (checkBox == 0) {
            setCheck(1);
        } else {
            setCheck(0);
        }
    }

    return (
        <div className="container">
            <table className="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Company</th>
                        <th scope="col">City</th>
                        <th scope="col">Website</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{task.name}</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>

            <table className="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{task.first_name}</th>
                        <td>{task.first_name}</td>
                        <td>{task.phone}</td>
                        <td>{task.email}</td>
                    </tr>
                </tbody>
            </table>
            <form onSubmit={handleSubmit(onSubmit)}>
                <fieldset id="myFieldSet">
                    <div className="form-group">
                        <input
                            type="hidden"
                            value={task.id || ""}
                            ref={register}
                            name="id"
                        />
                        <label>Date</label>
                        <input
                            className="form-control form-control-lg"
                            type="date"
                            value={task.due_date || ""}                            
                            ref={register}
                            onChange={handleChange}
                            name="due_date"
                        />
                    </div>

                    <div className="form-group">
                        <label>Description</label>
                        <textarea
                            className="form-control"
                            id="exampleFormControlTextarea1"
                            name="description"
                            ref={register}
                            onChange={handleChange}
                            value={task.description}
                            //defaultValue={task.description}
                        />
                    </div>

                    <div className="form-check">
                        <label
                            className="form-check-label"
                            htmlFor="exampleCheck1"
                        >
                            Completed
                        </label>
                        <input
                            type="checkbox"
                            className="form-check-input"
                            id="exampleCheck1"
                            ref={register}
                            onChange={handleChange}
                            name="status"
                            value={checkBox}
                            checked={checkBox == 0 ? false : true}
                        />
                    </div>
                    <button type="submit" className="btn btn-primary">
                        Submit
                    </button>
                </fieldset>
            </form>
        </div>
    );
}

export default Task;
