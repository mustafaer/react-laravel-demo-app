import React from 'react';
import {BrowserRouter as Router, Link, Route, Switch} from 'react-router-dom';
import './App.css';
import StudentComponent from "./student.component";
import ClassroomComponent from "./Classroom";
import LessonComponent from "./lesson.component";

export default function App() {
    return (
        <Router>
            <nav className="navbar navbar-expand-lg navbar-light navbar-background">
                <a className="navbar-brand" href="/"><b>SCHOOL APP</b></a>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarNav">
                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <Link className="nav-link nav-item-color" to="/">Students</Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link nav-item-color" to="/lessons">Lessons</Link>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link nav-item-color" to="/classroom">Classrooms</Link>
                        </li>
                    </ul>
                </div>
            </nav>
            <div className="app-body">

                {/*
          A <Switch> looks through all its children <Route>
          elements and renders the first one whose path
          matches the current URL. Use a <Switch> any time
          you have multiple routes, but you want only one
          of them to render at a time
        */}
                <Switch>
                    <Route exact path="/">
                        <StudentComponent/>
                    </Route>
                    <Route path="/lessons">
                        <LessonComponent/>
                    </Route>
                    <Route path="/classroom">
                        <ClassroomComponent/>
                    </Route>
                </Switch>
            </div>
        </Router>
    );
}