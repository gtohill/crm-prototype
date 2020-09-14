import React, { useState, useEffect } from "react";
import axios from "axios";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";


function CompanyContainer() {
    const [clients, setClients] = useState([]);

    useEffect(() => {
        axios.get("http://localhost:8000/api/company").then(res => {
            // console.log(res);
            // console.log("Clients: " + res.data);
            setClients(res.data);
        });
    }, []);

    return (
       
            <div className="container-fluid">
                <div className="row">
                    <div className="col-sm-5">
                        <table className="table">
                            <thead>
                                <tr>
                                    <th scope="col">Company</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone #</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                {clients.map(client => (
                                    <tr key={client.id}>
                                        <td>{client.name}</td>
                                        <td>{client.city}</td>
                                        <td>{client.phone}</td>
                                        <td>{client.url}</td>
                                        <td>
                                        <Link to={"/company/"+client.id}>Go to Company</Link>
                                            <a
                                                className="nav-link"
                                                href="/company"
                                            >
                                                Company
                                            </a>
                                           
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       
    );
}

export default CompanyContainer;
