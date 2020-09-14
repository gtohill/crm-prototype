import React from "react";
import ReactDOM from "react-dom";
import Nav from "./Nav";
import CompanyContainer from "./CompanyContainer";
import TasksContainer from "./TasksContainer";
import {
    BrowserRouter as Router,
    HashRouter,
    Switch,
    Route,
    Link
} from "react-router-dom";
import Task from "./Task";
import Company from "./Company";
import Contact from "./Contact";

function App() {
    return (
        <Router>
            <Nav />
            <Route path="/companies" component={CompanyContainer} />
            <Route path="/tasks" component={TasksContainer} />
            <Route path="/task/:id" exact component={Task} />

            <Route
                exact
                path="/company/:id"
                render={props => <Company {...props} />}
            />
            <Route
                exact
                path="/company/:id/contact/:id"
                render={props => <Contact {...props} />}
            />
        </Router>
    );
}

export default App;

if (document.getElementById("root")) {
    ReactDOM.render(<App />, document.getElementById("root"));
}
