import React, { useState, useEffect } from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

function Company(props) {
    console.log(props);
    // state
    const [company, setCompany] = useState([]);
    const [contacts, setContacts] = useState([]);
    const [tasks, setTasks] = useState([]);    
    const [id, setId] = useState(props.match.params.id);
    
    if(localStorage.getItem('companyId') == null){        
        localStorage.setItem('companyId', props.match.params.id);
        console.log("local store is being set");
    }else{
        setId(localStorage.getItem('companyId'));       
    }

    // get company details
    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = async () => {
        const data = await fetch(`http://localhost:8000/api/company/${id}`);
        const item = await data.json();
        setCompany(item[0]);
        setContacts(item[1]);
        setTasks(item[2]);
    };

    // display company details
    return (
        <div className="container">
            <div className="row">
                <div className="col-md-6">
                    <div>{company.name}</div>
                    <br />
                    <div>{company.address}</div>
                    <br />
                    <div>{company.url}</div>
                    <br />
                    <div>{company.city}</div>
                    <br />
                    <div>{company.prov}</div>
                    <br />
                    <div>{company.pc}</div>
                    <br />
                    <div>{company.phone}</div>
                    <br />
                    <br />
                </div>
            </div>
            <div className="row">
                <div className="col-md-6">
                    {contacts.map(contact => (
                        <div key={contact.id}>                        
                            <div>{contact.first_name}</div>
                            <div>{contact.last_name}</div>
                            <div>{contact.phone}</div>
                            <div>{contact.email}</div>
                            <Link to={"/company/"+company.id+"/contact/"+contact.id}>Go to Contact</Link>                                           
                        </div>
                    ))}
                </div>
            </div>
            <div className="row">
                <div className="col-md-6">
                    {tasks.map(task => (
                        <div key={task.id}>
                            <div>{task.due_date}</div>
                            <div>{task.description}</div>
                            <div>{task.status}</div>
                        </div>
                    ))}
                </div>
            </div>
            <div className="row">Completed Tasks</div>
        </div>
    );
}

export default Company;
