import React from 'react';
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faEdit, faPlusCircle, faSearch, faTrash} from '@fortawesome/free-solid-svg-icons';

export default class StudentComponent extends React.Component<any> {

    students: any;
    table = [];

    getStudentsData() {
        fetch("http://127.0.0.1:8000/api/student")
            .then(res => res.json())
            .then(
                (result) => {
                    this.students = result.data;
                    for (let student of this.students) {
                        let data = <tr>
                            <td className="operation-button-area">
                                <button className="btn btn-info tbl-btn" id="btn-edit" title="Düzenle">
                                    <FontAwesomeIcon icon={faEdit}/>
                                </button>
                                &nbsp;
                                <button className="btn btn-danger tbl-btn" id="btn-delete" title="Sil">
                                    <FontAwesomeIcon icon={faTrash}/>
                                </button>
                            </td>
                            <td>{student.name + ' ' + student.surname}</td>
                            <td>{student.username}</td>
                            <td>{student.created_at}</td>
                            <td>{student.updated_at}</td>
                        </tr>;
                        console.log(data)
                        this.table.push(data);
                    }
                },
                (error) => {
                    console.log('error')
                }
            ).catch(err => {
            console.log(err);
        });
    }

    componentDidMount() {
        this.getStudentsData();
    }

    public render() {
        return (
            <div className="main-panel-body">
                <div className="panel-area-head">
                    <h3>Öğrenci Yönetimi</h3>
                    <span className="float-left float-sm-right">
                        <div className="input-group mb-3">
                        <input aria-describedby="button-addon2" aria-label="Recipient's username"
                               className="form-control" type="text" placeholder="Ara"/>
                            <div className="input-group-append">
                                <button className="btn btn-info" id="button-addon2" type="button">
                                    <FontAwesomeIcon icon={faSearch}/>
                                </button>
                            </div>
                        </div>
                    </span>
                </div>
                <div className="table-responsive table-div">
                    <table className="table table-striped">
                        <thead>
                        <tr>
                            <th className="operation-button-area">İşlemler</th>
                            <th>Ad Soyad</th>
                            <th>Kullanıcı Adı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        {this.table}
                        <tr>
                            <td>
                                <button className="btn btn-success tbl-btn" title="Ekle"><FontAwesomeIcon
                                    icon={faPlusCircle}/></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        );
    }
}