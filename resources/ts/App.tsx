import React from "react";
import SignIn from "./components/SignIn";
import TodoList from "./components/todo/TodoList";
import TodoCreate from "./components/todo/TodoCreate";
import TodoEdit from "./components/todo/TodoEdit";
import {createBrowserHistory} from 'history';
import {Router,Switch, Route} from 'react-router-dom';


const history = createBrowserHistory();
const App: React.FC = () => {
    return (
        <Router history={history}>
            <Switch>
                <Route exact path={"/"} component={SignIn} />
                <Route exact path={"/todo"} component={TodoList} />
                <Route exact path={"/todo/create"} component={TodoCreate} />
                <Route exact path={"/todo/:todoId/edit"} component={TodoEdit} />
            </Switch>
        </Router>
    );
}

export default App;
