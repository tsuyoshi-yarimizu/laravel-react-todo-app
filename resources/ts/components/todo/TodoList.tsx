import React, { useEffect, useState } from "react";
import { Button, Typography } from "@material-ui/core";
import MUIDataTable, { MUIDataTableColumnDef, MUIDataTableOptions } from "mui-datatables";
import axios from "axios";
import { Priority } from "../../enums/Priority";
import { useHistory } from 'react-router-dom';

const TodoList: React.FC = () => {
    const history = useHistory();
    const columns: MUIDataTableColumnDef[] = [
        {
            name: "todo_id",
            options: {
                display: false
            }
        },
        {
            name: "priority",
            label: "優先度",
            options: {
                customBodyRender: (value, tableMeta, updateValue) => {
                    let priorityText = '';
                    if (value === Priority.LOW) {
                        priorityText = Priority.TextLow;
                    } else if (value === Priority.MIDDLE) {
                        priorityText = Priority.TextMiddle;
                    } else if (value === Priority.HIGH) {
                        priorityText = Priority.TextHigh;
                    }

                    return (
                        <Typography>{priorityText}</Typography>
                    );
                }
            }
        },
        "todo_name",
        "todo_detail",
        "expire_date"
    ];

    const handleRowOnClick = (todoId: number) => {
        history.push(`/todo/${todoId}/edit`);
    }

    const handleNewTodoClick = () => {
        history.push('/todo/create');
    }

    const options:MUIDataTableOptions = {
        filterType: 'checkbox',
        onRowClick: (rowData) => {
            const todoId = rowData[0];
            handleRowOnClick(Number(todoId));
        }
    };

    interface ITodoState {
        todo_id: number,
        user_id: number,
        todo_name: string,
        todo_detail: string,
        expire_date: string,
        priority: number,
        created_at: string,
        updated_at: string,
    }
    const [todos, setTodos] = useState<ITodoState[]>([]);
    useEffect(() => {
        const fetchTodos = async () => {
            const result = await axios.get('/api/todo');

            setTodos(result.data);
        }

        fetchTodos();
    }, []);

    return (
        <div>
            <div>
                <Button color={"primary"} variant={"outlined"} type={"button"} onClick={handleNewTodoClick}>作成</Button>
            </div>
            <MUIDataTable columns={columns} data={todos} title={"Employee List"} options={options} />
        </div>
    )
}

export default TodoList;
