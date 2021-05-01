import React, {useState} from "react";
import {Button, Slider, TextField, Typography} from "@material-ui/core";
import moment from 'moment';
import {makeStyles} from "@material-ui/core/styles";
import {useForm, Controller, FieldError} from "react-hook-form";
import axios from "axios";
import {Priority} from "../../enums/Priority";
import {useHistory} from 'react-router-dom';

const useStyles = makeStyles((theme) => ({
    root: {},
    inputs: {
        marginTop: theme.spacing(2)
    }
}));

const priorityMark = [
    {
        value: Priority.LOW,
        label: Priority.TextLow,
    },
    {
        value: Priority.MIDDLE,
        label: Priority.TextMiddle,
    },
    {
        value: Priority.HIGH,
        label: Priority.TextHigh,
    },
];


interface IFormInput {
    todo_name: string;
    todo_detail: string;
    expire_date: Date;
    priority: number;
}

const validation = {
    todo_name: {
        required: '必須項目です',
        maxLength: {
            value: 20,
            message: '20文字以内で入力してください'
        }
    },
    todo_detail: {
        required: '必須項目です',
        maxLength: {
            value: 20,
            message: '20文字以内で入力してください'
        }
    },
    expire_date: {
        required: '必須項目です',
    },
}

const TodoCreate: React.FC = () => {
    const classes = useStyles();
    const history = useHistory();
    const { control, handleSubmit, formState: { errors }, setValue, getValues } = useForm<IFormInput>();
    const onSubmit = (data: IFormInput) => {
        console.log(data);
        axios.post('/api/todo', data)
            .then((response) => {
                console.log(response);
                history.push('/todo');
            })
            .catch((err) => {
                console.log(err);
            });
    }

    const handleChange = (value: number|number[]) => {
        let val;
        if (typeof value === 'object') {
            val = value[0];
        } else {
            val = value;
        }
        setValue('priority', val);
    }

    return (
        <div className={classes.root}>
            <form onSubmit={handleSubmit(onSubmit)}>
                <Controller
                    name={"todo_name"}
                    control={control}
                    defaultValue={""}
                    rules={validation.todo_name}
                    render={({field}) => (
                        <TextField
                            className={classes.inputs}
                            label={"タスク名"}
                            placeholder={"タスク名"}
                            fullWidth
                            variant={"outlined"}
                            {...field}
                            error={!!(errors.todo_name)}
                            helperText={(errors.todo_name)? errors.todo_name.message : ''}
                        />
                    )}
                />
                <Controller
                    name={"todo_detail"}
                    control={control}
                    defaultValue={""}
                    rules={validation.todo_detail}
                    render={({field}) => (
                        <TextField
                            className={classes.inputs}
                            label={"タスク詳細"}
                            placeholder={"タスク詳細"}
                            fullWidth
                            multiline
                            rows={4}
                            variant={"outlined"}
                            {...field}
                            error={!!(errors.todo_detail)}
                            helperText={(errors.todo_detail)? errors.todo_detail.message : ''}
                        />
                    )}
                />
                <Controller
                    name={"expire_date"}
                    control={control}
                    defaultValue={moment().format('YYYY-MM-DD')}
                    rules={validation.expire_date}
                    render={({field}) => (
                        <TextField
                            className={classes.inputs}
                            label={"期限"}
                            fullWidth
                            variant={"outlined"}
                            type={"date"}
                            {...field}
                            error={!!(errors.expire_date)}
                            helperText={(errors.expire_date)? errors.expire_date.message : ""}
                        />
                    )}
                />
                <Typography gutterBottom className={classes.inputs}>
                    優先度
                </Typography>
                <Controller
                    name={"priority"}
                    control={control}
                    defaultValue={Priority.LOW}
                    render={({field}) => (
                        <Slider
                            step={1}
                            marks={priorityMark}
                            min={1}
                            max={3}
                            {...field}
                            onChange={() => {}}
                            onChangeCommitted={(e, value) => {
                                handleChange(value);
                            }}
                        />
                    )}
                />
                <Button color={"primary"} type={"submit"} className={classes.inputs} variant={"contained"}>作成</Button>
            </form>
        </div>
    );
}

export default TodoCreate;
