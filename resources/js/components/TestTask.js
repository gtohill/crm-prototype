import React, { useEffect, useState } from "react";
import axios from "axios";

function TestTask(props) {
    const [id, setId] = useState(props.id);
    const [task, setTask] = useState([]);
    //const {register, handleSubmit} = useForm();
    const [description, setDescription] = useState("");


    const onSubmit = data => {
        alert(JSON.stringify(data));
    };
    
    function handleChange(e){
        setDescription(e.value);
    }
    
    useEffect(() => {
        fetchData();
        
    }, []);

    const fetchData = async () => {
        const data = await fetch(
            `http://localhost:8000/api/task/${id}`
        );
        const item = await data.json();
        console.log("Test task item: "+item);
        setTask(item);
    };

    //var descrip= task.description;
    
    return (
        <h3>{props.id}</h3>
    );
}

export default TestTask;
